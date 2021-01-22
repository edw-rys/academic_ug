<?php

namespace App\DataTables;

use App\Models\CourseStudent;
use App\Models\CourseSubject;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CourseStudentDataTable extends DataTable
{
    use DataTableBase;

    private $action = 'course_student';
    private $route  = 'admin.course_student';
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

        $model->with(['course','period', 'teacher', 'subject','course_students','course_students.student']);

        return $model->newQuery();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('course')->title('Curso')->className('text-center')->width(25),
            // Column::make('period')->title('Periodo')->className('text-center'),
            Column::make('subject')->title('Asignatura')->className('text-center'),
            // Column::make('teacher')->title('Profesor')->className('text-center'),
            Column::make('course_students')->title('Estudiantes')->className('text-center'),
            Column::make('show_statistics')->title('Estadísticas')->className('text-center')->width(25)->searchable(false)->printable(false)->exportable(false),
            
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
        
        return datatables()
            ->eloquent($query)
            ->setRowId('id')
            ->setRowClass(static function ($query) {
                return '';
            })
            ->editColumn('id', static function ($query) {
                return $query->id;
            })
            ->addColumn('course', static function ($query) {
                return $query->course->name .'<br>'.Carbon::create($query->period->start_date)->format(config('app_academic.setting.date_format_show')).' - '. Carbon::create($query->period->end_date)->format(config('app_academic.setting.date_format_show'));
            })
            ->addColumn('period', static function ($query) {
                return Carbon::create($query->period->start_date)->format(config('app_academic.setting.date_format_show')).' - '. Carbon::create($query->period->end_date)->format(config('app_academic.setting.date_format_show'));
            })
            ->addColumn('subject', static function ($query) {
                return $query->subject->name . '<br>'. $query->teacher->name .' '. $query->teacher->last_name;
            })
            ->addColumn('teacher', static function ($query) {
                return $query->teacher->name .' '. $query->teacher->last_name;
            })
            ->addColumn('course_students', static function ($query) use ($route) {
                // return $query->course_students;
                return edit_action($route.'.students',$query->id,'Ver estudiantes','btn btn-info');
                $html = '';
                $count = 0;
                foreach ($query->course_students as $key => $value) {
                    $html .=  '<div class="badge badge-info">'.( $value->student ? ($value->student->name .' '.$value->student->last_name) : '*') .'</div>';
                    $count ++;
                    if($count>=4){
                        $html .=  '<br><div style="margin:10px "></div>';
                        $count = 0;
                    }
                    
                }
                // dd($html);
                return $html;
            })
            ->addColumn('show_statistics', function($query) use ($route){
                return edit_action($route.'.statistics', $query->id, 'Mostrar', 'btn btn-warning');
            })
            ->escapeColumns([]);
    }
}