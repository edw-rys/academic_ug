<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StudentsDataTable extends DataTable
{
    use DataTableBase;

    private $action = 'students';
    private $route  = 'admin.students';
    public $filters;

    /**
     * StudentsDataTable constructor.
     *
     */
    public function __construct()
    {
        //$this->repository = Users::class;
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(User $model): Builder
    {
        return getUsersByRole('student');//$model->where('status', 'active');
        // return $model->where('status','active');//getUsersByRole('teacher');//$model->where('status', 'active');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('name')->title('Nombre')->className('text-center'),
            Column::make('last_name')->title('Apellidos')->className('text-center'),
            Column::make('email')->title('Correo')->className('text-center'),
            Column::make('status')->title('Estado')->className('text-center'),
            Column::computed('actions')->title('Acción')->className('text-center noExport')->width(100)->searchable(false)->printable(false)->exportable(false)
        ] ;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->getHtml(3, 'desc');
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        $action     = $this->action;
        $route      = $this->route;
        $context    = $this;
        // dd();
        return datatables()
            ->eloquent($query)
            ->setRowId('id')
            ->setRowClass(static function ($query) {
                return '';
            })
            ->editColumn('id', static function ($query) {
                return $query->id;
            })
            ->editColumn('id', static function ($query) {
                return $query->id;
            })
            ->editColumn('name', static function ($query) {
                return $query->name;
            })
            ->editColumn('last_name', static function ($query) {
                return $query->last_name;
            })
            ->editColumn('email', static function ($query) {
                return $query->email;
            })
            ->editColumn('status', static function ($query) {
                return status($query->status);
            })
            ->addColumn('actions', static function ($query) use ($action, $route) {
                return dropdown_action($query->id, $query->status, $action, $route,$query->protected ?? 0);
            })
            ->escapeColumns([]);
    }
}