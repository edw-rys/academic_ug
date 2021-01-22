<?php

namespace App\Http\Controllers\User\Admin;

use App\DataTables\CouseSubjectDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouseSubject\StoreCouseSubjectRequest;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\CourseSubject;
use App\Models\Period;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseSubjectController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->title = 'Cursos-Profesores-Asignaturas';
        $this->singular_title = 'Cursos';
        $this->action = 'course_subject';
        $this->permissions  = (object) [
            'access'        => 'access_course_subject',
            'create'        => 'create_course_subject',
            'edit'          => 'edit_course_subject',
            'delete'        => 'delete_course_subject',
            'restore'       => 'restore_course_subject',
        ];

        $this->views        = (object) [
            'index'         => 'users.admin.pages.course_subject.index',
            'create'        => 'users.admin.pages.course_subject.create',
            'edit'          => 'users.admin.pages.course_subject.edit',
            'show'          => 'users.admin.pages.course_subject.show'
        ];

        $this->routes       = (object) [
            'index'         => 'admin.course_subject.index',
            'create'        => 'admin.course_subject.create',
            'edit'          => 'admin.course_subject.edit',
            'show'          => 'admin.course_subject.show'
        ];
    }


    /**
     * List all items
     *
     * @param CouseSubjectDataTable $dataTable
     * @return mixed
     */
    public function index(CouseSubjectDataTable $dataTable){
        
        $periods = Period::where('status', '!=' ,'deleted')
    		->orderBy('id','desc')
    		->get();

        viewExist($this->views->index);

        return $dataTable->render($this->views->index,
            [
                'title' => $this->title, 
                'periods'   => $periods,
                'action'    => $this->action,
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

        if(Period::where('status','active')->get()->last() == null){
            return 'No hay periodo activo.';
        }

        return view($this->views->create)
            ->with('route', 'admin.course_subject.store')
            ->with('action', $this->action)
            ->with('course_all', Course::where('status','active')->get())
            ->with('subjects', Subject::where('status','active')->get());
    }

    // TODO
    /**
     * Store new item into DB
     *
     * @param StoreCouseSubjectRequest $request
     * @return JsonResponse
     */
    public function store(StoreCouseSubjectRequest $request){
        
        canAccessTo($this->permissions->create);

        $period = Period::where('status','active')->get()->last();

        if($period == null){
            return response()->json([
                'message' => 'No se puede asignar.',
                'action'  => 'create'
            ],404);
        }
        $request->merge([
            'created_at' => Carbon::now(),
            'period_id' => $period->id,
            'status'    => 'active'
        ]);

        $data = CourseSubject::where('teacher_id', $request->input('teacher_id'))
            ->where('subject_id', $request->input('subject_id'))
            ->where('course_id', $request->input('course_id'))
            ->first();
        if($data !== null){
            return response()->json([
                'message' => 'No se puede asignar.',
                'action'  => 'create'
            ],402);
        }
        
        CourseSubject::create($request->all());

        return response()->json([
            'message' => 'Creado',
            'action'  => 'create'
        ]);
    }
    /**
     * @param $id
     * @return JsonResponse
     */
    public function getByCourse($id)
    {
        $period = Period::where('status','active')->get()->last();
        if($period == null){
            return response()->json([
                'message' => 'Periodo no habilitado'
            ],404);
        }
        return response()->json(
            CourseSubject::where('course_id', $id)
                ->where('period_id', $period->id)
                ->with(['subject', 'teacher'])
                ->get()
        );
    }
    
}
