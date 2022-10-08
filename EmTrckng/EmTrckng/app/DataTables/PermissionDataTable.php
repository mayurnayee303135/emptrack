<?php

namespace App\DataTables;

use App\Models\Permission;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PermissionDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'permissions.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Permission $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Permission $model)
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
    protected $actions = ['create', 'export', 'print', 'reset', 'loadPermission'];
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['searchable' => false],
            'name',
            'title',
            'guard_name',
            'description',
            'module'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'permissions_datatable_' . time();
    }
    public function loadPermission()
    {
    }
}
