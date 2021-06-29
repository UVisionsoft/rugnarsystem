<?php

namespace App\DataTables;

use App\Models\Activity;
use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Jackiedo\LogReader\Exceptions\UnableToRetrieveLogFilesException;
use Jackiedo\LogReader\LogReader;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VaccinesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns(['action'])
            ->addColumn('action', function (Vaccine  $model) {
                return view('pages.vaccines._action-menu', compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Activity $model
     *
     * @return Builder
     */
    public function query(Vaccine $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('vaccines-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->responsive()
            ->autoWidth(false)
            ->dom("<f<t>
<'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'l><'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>
>")
            ->parameters(['scrollX' => true])
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5')
            ->initComplete("function( settings, json ) {
    $(this).closest('.dataTables_wrapper').find('.dataTables_filter input').addClass('form-control form-control-solid w-250px').removeClass('form-control-sm');
    $(this).closest('.dataTables_wrapper').find('.custom-select').addClass('form-select form-select-sm form-select-solid');
}")
            ->headerCallback("function( thead, data, start, end, display ) {
    $(thead).find('th').addClass( 'text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0' );
}");
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title('#'),
            Column::make('name')->title('اسم التطعيم'),
            Column::make('action')->title('خيارات'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Activities_' . date('YmdHis');
    }
}
