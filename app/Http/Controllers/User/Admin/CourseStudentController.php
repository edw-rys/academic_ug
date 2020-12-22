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
        $this->title = 'Matriculas';
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
            'show'          => 'users.admin.pages.course_student.show'
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

        return $dataTable->render($this->views->index,
            [
                'title' => $this->title, 
                'singular_title'=> $this->singular_title,
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

    
    public function statistics($id)
    {
        $data = CourseStudent::where('id', $id)
            ->with('course_subject')
            ->with('course_subject.class_subject')
            ->with('course_subject.class_subject.comments')
            ->first();
        // dd($data);
        return '<h1>Se detiene el desarrollo por un bajón emocional.</h1>';
    }
}
