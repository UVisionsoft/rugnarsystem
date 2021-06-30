<?php

namespace App\DataTables;

use App\Models\ActivitySessions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Jackiedo\LogReader\Exceptions\UnableToRetrieveLogFilesException;
use Jackiedo\LogReader\LogReader;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ActivitySessionsDataTable extends DataTable
{
    protected $trainer;
    /**
     * Build DataTable class.
     *
     * @param  mixed  $query  Results from query() method.
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns(['action'])
            ->addColumn('dog', function (ActivitySessions $model){
                return $model->activity->dog->name;
            })
            ->addColumn('training', function (ActivitySessions  $model){
                return $model->activity->training->name;

            })
            ->addColumn('action', function (ActivitySessions  $model) {
                return view('pages.users.sessions._action-menu', compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param  ActivitySessions  $model
     *
     * @return Collection
     */
    public function query(ActivitySessions $model)
    {
        if($this->trainer instanceof Model)
            return ActivitySessions::where('trainer_id', $this->trainer->id);

        return ActivitySessions::where('trainer_id', $this->trainer);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('activities-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(3)
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

    public function trainer($trainer)
    {
        $this->trainer = $trainer;

        return $this;
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
            Column::make('dog')->title('اسم الكلب'),
            Column::make('training')->title('التدريب'),
            Column::make('duration')->title('مدة التدريب'),
            Column::computed('action')->title('خيارات')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->responsivePriority(-1),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'SystemLogs_'.date('YmdHis');
    }
}