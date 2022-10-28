<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'users.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->with('role');
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
                'stateSave' => false,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-info btn-sm no-corner','title' => __('datatables.bcreate')],
                    ['extend' => 'export', 'className' => 'btn btn-info btn-sm no-corner ml-2','title' => __('datatables.bexport')],
                    ['extend' => 'print', 'className' => 'btn btn-info btn-sm no-corner ml-2','title' => __('datatables.bprint')],
                    ['extend' => 'reset', 'className' => 'btn btn-info btn-sm no-corner ml-2','title' => __('datatables.breset')],
                    ['extend' => 'reload', 'className' => 'btn btn-info btn-sm no-corner ml-2','title' => __('datatables.breload')],
                ],
                'language' => __('datatables')
            ]);
    }

    /**
     * Get columns.
     * new Column(['title' => __('users.fields.position_name'), 'data' => 'position_name', 'orderable' => false, 'searchable' => false]),
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['searchable' => false],
            'name',
            'email',
            'role_id' => ['title' => 'Role', 'data' => 'role.name', 'name' => 'role.name'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_datatable_' . time();
    }
}
