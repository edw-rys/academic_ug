<?php

namespace App\Http\Controllers\User\Admin;

use App\DataTables\CourseDataTable;
use App\DataTables\CourseStudentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseStudent\CourseStudentRequest;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\CourseSubject;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->title = 'Matrículas';
        $this->singular_title = 'Matricula';
        $this->action = 'course_student';
        $this->permissions  = (object) [
            'access'        => 'access_course_student',
            'create'        => 'create_course_student',
            'edit'          => 'edit_course_student',
            'delete'        => 'delete_course_student',
            'restore'       => 'restore_course_student',
        ];

        $this->views        = (object) [
            'index'         => 'users.admin.pages.course_student.index',
            'create'        => 'users.admin.pages.course_student.create',
            'edit'          => 'users.admin.pages.course_student.edit',
            'show'          => 'users.admin.pages.course_student.show',
            'students'      => 'users.admin.pages.course_student.students'
        ];

        $this->routes       = (object) [
            'index'         => 'admin.course_student.index',
            'create'        => 'admin.course_student.create',
            'edit'          => 'admin.course_student.edit',
            'show'          => 'admin.course_student.show'
        ];
    }


    /**
     * List all items
     *
     * @param CourseStudentDataTable $dataTable
     * @return mixed
     */
    public function index(CourseStudentDataTable $dataTable){

        canAccessTo($this->permissions->access);

        viewExist($this->views->index);

        $periods = Period::where('status', '!=' ,'deleted')
    		->orderBy('id','desc')
    		->get();

        return $dataTable->render($this->views->index,
            [
                'title' => $this->title,
                'singular_title'=> $this->singular_title,
                'periods'   => $periods,
                'action'    => $this->action
            ]
        );
    }

     // TODO
    /**
     * Create new item
     *
     * @return Factory|View
     */
    public function create(){

        canAccessTo($this->permissions->create);

        viewExist($this->views->create);

        if(Period::where('status','active')->get()->last() == null){
            return 'No hay periodo activo.';
        }

        $data = CourseSubject::where('status', 'active')
            ->with(['course','period', 'teacher', 'subject'])
            ->get();
        return view($this->views->create)
            ->with('route', 'admin.course_student.store')
            ->with('action', $this->action)
            ->with('course_all', Course::where('status','active')->get())
            ->with('subjects', $data);
    }


    /**
     * Store new item into DB
     *
     * @param CourseStudentRequest $request
     * @return JsonResponse
     */
    public function store(CourseStudentRequest $request){
        canAccessTo($this->permissions->create);
        $period = Period::where('status','active')->get()->last();
        $request->merge([
            'created_at' => Carbon::now(),
            'period_id' => $period->id,
            'status'    => 'active'
        ]);
        $data = CourseStudent::where('student_id', $request->input('student_id'))
            ->where('course_subject_id', $request->input('course_subject_id'))
            ->first();
        if($data !== null){
            return response()->json([
                'message' => 'No se puede asignar.',
                'action'  => 'create'
            ],400);
        }
        CourseStudent::create($request->all());
        return response()->json([
            'message' => 'Creado',
            'action'  => 'create'
        ]);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function statistics($id)
    {
        $data = CourseSubject::with('period')
            ->with('course')
            ->with('teacher')
            ->with('subject')
            ->with('course_students')
            ->with('course_students.student')
            ->with(['class_subject'=>function($query){
                $query->with('comments');
            }])
            ->where('id', $id)
            ->first();

            if($data === null){
                // abort(404);
                return 404;
            }

        $negative_percent = 0;
        $positive_percent = 0;
        $neutra_percent = 0;
        foreach ($data->class_subject as $key => $value) {
            if(isset($value->comments) && count($value->comments)>0){
                foreach ($value->comments as $key => $comment) {
                    $negative_percent += $comment->negative;
                    $positive_percent += $comment->positive;
                    $neutra_percent += $comment->neutral;
                }
            }
        }
        $size = count($data->class_subject) * count($data->course_students);
        $size = $size == 0? 1:$size;
        $negative_percent = ( $negative_percent/ $size)*100;
        $positive_percent = ( $positive_percent/ $size)*100;
        $neutra_percent =   ( $neutra_percent/ $size)*100;
        // Return view with data
        return view('users.admin.pages.course_subject.show')
            ->with('data', $data)
            ->with('negative_percent', $negative_percent)
            ->with('positive_percent', $positive_percent)
            ->with('neutral_percent', $neutra_percent);
                // return '<h1>Se detiene el desarrollo por un bajón emocional.</h1>';
    }

    /**
     * Show the students enrolled in that subject with the teacher.
     * @param $id | Id of the column that joins the subject and the teacher
     * @return Factory|View
     */
    public function showStudents($id)
    {
        $courseSubject = CourseSubject::where('id', $id)
            ->with('course')
            ->with('period')
            ->with('teacher')
            ->with('subject')
            ->with('course_students')
            ->with('course_students.student')
            ->first();
        if($courseSubject == null){
            abort(404);
        }
        return view($this->views->students)
            ->with('data', $courseSubject);
    }
}
