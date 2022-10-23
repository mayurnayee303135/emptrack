<?php

namespace App\DataTables;

use App\Models\UserAttendance;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserAttendanceDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'user_attendance.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserAttendance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserAttendance $model)
    {
        return $model->newQuery()->with('user');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('datatables.bAction')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner','title' => __('datatables.bexport')],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner','title' => __('datatables.bprint')],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner','title' => __('datatables.breset')],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner','title' => __('datatables.breload')],
                ],
                'language' => __('datatables')
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['searchable' => false],
            'user_name' => ['title' => __('models/attendances.fields.user_id'), 'data' => 'user_name', 'name' => 'user.name'],
            'check_in_date' => ['title' => __('models/attendances.fields.check_in_date')],
            'check_in_time' => ['title' => __('models/attendances.fields.check_in_time')],
            'check_out_date' => ['title' => __('models/attendances.fields.check_out_date')],
            'check_out_time' => ['title' => __('models/attendances.fields.check_out_time')],
            'user_location' => ['title' => __('models/attendances.fields.user_location')]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'user_attendance_datatable_' . time();
    }
}
