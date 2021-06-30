<?php

namespace App\DataTables;

use App\Models\ActivityReport;
use App\Models\ActivitySession;
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
            ->rawColumns(['action','session_status'])
            ->addColumn('dog', function (ActivityReport $model){
                return $model->activity->dog->name;
            })
            ->addColumn('training', function (ActivityReport  $model){
                return $model->activity->training->name;
            })
            ->addColumn('remaining', function (ActivityReport  $model){
                return $model->activity->remaining_hours;
            })
            ->addColumn('session_status', function (ActivityReport  $model){
                return '<div class="badge badge-light-' . ($model->session_status == 0 ?"danger":"success") . ' fw-bolder">' . ($model->session_status == 0 ? "غير مكتمل":"مكتمل") . '</div>';
            })
            ->addColumn('action', function (ActivityReport  $model) {
                return view('pages.users.sessions._action-menu', compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param  ActivitySession  $model
     *
     * @return Collection
     */
    public function query(ActivityReport $model)
    {
        $trainer = $this->trainer;
        if($this->trainer instanceof Model)
            $trainer = $this->trainer->id;

            return ActivityReport::where('trainer_id', $trainer)->where('created_at', now()->toDateString());

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
            Column::make('dog')->title('اسم الكلب'),
            Column::make('training')->title('التدريب'),
            Column::make('hours_taken')->title('مدة التدريب'),
            Column::make('remaining')->title('المتبقي'),
            Column::make('session_status')->title('حالة التدريب'),
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
