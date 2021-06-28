<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    protected $userType;

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
            ->rawColumns(['action', 'type'])

//            ->editColumn('type', function ( $model) {
//                $styles = [
//                    'user' => 'danger',
//                    'trainer' => 'warning',
//                    'admin' => 'danger',
//
//                ];
//                $levels = array_keys($styles);
//                $style = 'info';
//                if (isset($styles[$levels[$model->get('type')]])) {
//                    $style = $styles[$levels[$model->get('type')]];
//                }
//                $value = $levels[$model->get('type')];
//
//                return '<div class="badge badge-light-' . $style . ' fw-bolder">' . $value . '</div>';
//            })
            ->addColumn('action', function ( $model) {
                return view('pages.users._action-menu', compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     *
     * @return Collection
     */
    public function query(User $model)
    {
        return $model->where('type', $this->userType);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('system-log-table')
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

    public function ofType($type)
    {
        $types = User::$types;
        if (!in_array($type, $types))
            throw new \Exception('unknown user type only supported: ' . implode(',', $types));

        $types = array_flip($types);
        $this->userType = $types[$type];

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
            Column::make('name'),
            Column::make('email'),
            Column::make('type'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'AccountLogs_' . date('YmdHis');
    }
}
