<?php

namespace App\Http\Controllers\User\Admin;

use App\DataTables\CourseDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\DestroyCourseRequest;
use App\Http\Requests\Admin\Course\RestoreCourseRequest;
use App\Http\Requests\Admin\Course\StoreCourseRequest;
use App\Http\Requests\Admin\Course\UpdateCourseRequest;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->title = 'Cursos';
        $this->singular_title = 'Curso';
        $this->action = 'course';
        $this->permissions  = (object) [
            'access'        => 'access_course',
            'create'        => 'create_course',
            'edit'          => 'edit_course',
            'delete'        => 'delete_course',
            'restore'       => 'restore_course',
        ];

        $this->views        = (object) [
            'index'         => 'users.admin.pages.course.index',
            'create'        => 'users.admin.pages.course.create',
            'edit'          => 'users.admin.pages.course.edit',
            'show'          => 'users.admin.pages.course.show'
        ];

        $this->routes       = (object) [
            'index'         => 'admin.course.index',
            'create'        => 'admin.course.create',
            'edit'          => 'admin.course.edit',
            'show'          => 'admin.course.show'
        ];
    }


    /**
     * List all items
     *
     * @param AdminDataTable $dataTable
     * @return mixed
     */
    public function index(CourseDataTable $dataTable){

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

        return view($this->views->create)
            ->with('route', 'admin.course.store')
            ->with('action', $this->action)
            ->with('singular_title', $this->singular_title);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param StoreCourseRequest $request
     * @return JsonResponse
     */
    public function store(StoreCourseRequest $request){
        canAccessTo($this->permissions->create);
        $request->merge([
            'created_at' => Carbon::now(),
        ]);
        Course::create($request->all());
        return response()->json([
            'message' => 'Creado',
            'action'  => 'create'
        ]);
    }
     /**
     * Edit an item
     *
     * @param $id
     * @return JsonResponse|View
     */
    public function edit($id){
        canAccessTo($this->permissions->edit);
        viewExist($this->views->edit);
        $item = Course::find($id);
        if($item == null){
            return response()->json([
                'message'    => 'Curso no encontrado'
            ],404);
        }
        return view($this->views->edit)
            ->with('item', $item)
            ->with('route', 'admin.course.update')
            ->with('action', $this->action);
    }

    /**
     * Update an item
     *
     * @param UpdateCourseRequest $request
     * @return JsonResponse
     */
    public function update(UpdateCourseRequest $request){
        canAccessTo($this->permissions->edit);
        $item = Course::find($request->input('id'));
        if($item == null){
            return response()->json([
                'message'    => 'Curso no encontrado'
            ],404);
        }
        $item->name = $request->input('name');
        $item->save();
        return response()->json([
            'message' => 'Editado',
            'action'  => 'edit'
        ]);
    }

    /**
     * Destroy an item
     *
     * @param DestroyCourseRequest $request
     * @return JsonResponse
     */
    public function destroy(DestroyCourseRequest $request, $id){
        canAccessTo($this->permissions->delete);
        $item = Course::find($id);
        if($item == null){
            return response()->json([
                'message'    => 'Curso no encontrado'
            ],404);
        }
        $item->status = 'deleted';
        $item->save();
        return response()->json([
            'message' => 'Eliminado',
            'action'  => 'destroy',
            'status'  => 'success'
        ]);
    }

    /**
     * Restore an item
     *
     * @param RestoreCourseRequest $request
     * @return JsonResponse
     */
    public function restore(RestoreCourseRequest $request){
        canAccessTo($this->permissions->delete);
        $item = Course::find($request->input('id'));
        if($item == null){
            return response()->json([
                'message'    => 'Curso no encontrado'
            ],404);
        }
        $item->status = 'active';
        $item->save();
        return response()->json([
            'message' => 'Restaurado',
            'action'  => 'restore',
            'status'  => 'success'
        ]);
    }
}
