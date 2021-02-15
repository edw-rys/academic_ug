<?php

namespace App\DataTables;

use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CouseSubjectDataTable extends DataTable
{
    use DataTableBase;

    private $action = 'course_subject';
    private $route  = 'admin.course_subject';
    public $filters;

    /**
     * TeachersDataTable constructor.
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
    public function query(CourseSubject $model): Builder
    {
        $request = $this->request();
        $period = null;
        
        if($request->period_id && $request->period_id != null){
            $period = Period::find($request->period_id);
        }
        if($period == null){
            $period = Period::where('status','active')->get()->last();
        }
        if($period != null){
            $model = $model->where('period_id', $period->id);
        }else{
            $model = $model->where('id', '0');
        }

        $model = $model->select(['course_id','period_id'])->groupBy(['course_id', 'period_id']);

        $model->with([
            'course','period'
        ]);
        return $model;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('course')->title('Curso')->className('text-center'),
            Column::make('period')->title('Periodo')->className('text-center'),
            Column::make('subjects')->title('Asignaturas')->className('text-center'),            
        ] ;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->getHtml(2, 'desc');
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
        $period = Period::where('status','active')->get()->last();
        $period = $period!=null ? $period : (object)['id'=>0];
        return datatables()
            ->eloquent($query)
            ->setRowId('id')
            ->setRowClass(static function ($query) {
                return '';
            })
            ->addColumn('course', static function ($query) {
                return $query->course ? $query->course->name : '';
            })
            ->addColumn('period', static function ($query) {
                return $query->period ? Carbon::create($query->period->start_date)->format(config('app_academic.setting.date_format_show')).' - '. Carbon::create($query->period->end_date)->format(config('app_academic.setting.date_format_show')) : '';
            })
            ->addColumn('subjects', static function ($query) use($period) {
                $list = CourseSubject::where('course_id', $query->course_id)
                    ->with('subject')
                    ->with('teacher')
                    ->where('period_id', $period->id)->get();
                $html = '';
                $count = 0;
                foreach ($list as $key => $value) {
                    $html .=  '<div class="badge badge-info">'.( $value->teacher ? ($value->teacher->name .' '.$value->teacher->last_name) : '*') .' - '. ($value->subject ? $value->subject->name: '*').'</div>';
                    $count ++;
                    if($count>=3){
                        $html .=  '<br><div style="margin:10px "></div>';
                        $count = 0;
                    }
                    
                }
                // dd($html);
                return $html;
            })
            ->escapeColumns([]);
    }
}