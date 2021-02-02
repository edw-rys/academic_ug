<?php

namespace App\Http\Controllers\User\Admin;

use App\DataTables\StudentsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\DestroyUserRequest;
use App\Http\Requests\Admin\User\RestoreUserRequest;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * StudentController constructor.
     */
    public function __construct()
    {
        $this->title = 'Estudiantes';
        $this->singular_title = 'Estudiante';
        $this->action = 'students';
        $this->permissions  = (object) [
            'access'        => 'access_students',
            'create'        => 'create_students',
            'edit'          => 'edit_students',
            'delete'        => 'delete_students',
            'restore'       => 'restore_students',
        ];

        $this->views        = (object) [
            'index'         => 'users.admin.pages.users.index',
            'create'        => 'users.admin.pages.users.create',
            'edit'          => 'users.admin.pages.users.edit',
            'show'          => 'users.admin.pages.users.show'
        ];

        $this->routes       = (object) [
            'index'         => 'admin.students.index',
            'create'        => 'admin.students.create',
            'edit'          => 'admin.students.edit',
            'show'          => 'admin.students.show'
        ];
    }


    /**
     * List all items
     *
     * @param StudentsDataTable $dataTable
     * @return mixed
     */
    public function index(StudentsDataTable $dataTable){

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
            ->with('route', 'admin.students.store')
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param StoreUserRequest $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request){

        canAccessTo($this->permissions->create);

        $request->merge([
            'created_at' => Carbon::now(),
            'password' => bcrypt($request->input('email'))
        ]);

        $role = Role::where('name','student')->first();

        $user = User::create($request->all());

        $user->roles()->attach($role);

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

        $user = User::find($id);

        if($user == null){
            return response()->json([
                'message'    => 'Usuario no encontrado'
            ],404);
        }

        return view($this->views->edit)
            ->with('user', $user)
            ->with('route', 'admin.students.update')
            ->with('action', $this->action);
    }

    /**
     * Update an item
     *
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request){

        canAccessTo($this->permissions->edit);

        $user = User::find($request->input('id'));

        if($user == null){
            return response()->json([
                'message'    => 'Usuario no encontrado'
            ],404);
        }

        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        if($request->input('password') !== null && !empty($request->input('password'))){
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return response()->json([
            'message' => 'Editado',
            'action'  => 'edit'
        ]);
    }

    /**
     * Destroy an item
     *
     * @param DestroyUserRequest $request
     * @return JsonResponse
     */
    public function destroy(DestroyUserRequest $request, $id){

        canAccessTo($this->permissions->delete);

        $user = User::find($id);

        if($user == null){
            return response()->json([
                'message'    => 'Usuario no encontrado'
            ],404);
        }

        $user->status = 'deleted';
        $user->save();

        return response()->json([
            'message' => 'Eliminado',
            'action'  => 'destroy',
            'status'  => 'success'
        ]);
    }

    /**
     * Destroy an item
     *
     * @param RestoreUserRequest $request
     * @return JsonResponse
     */
    public function restore(RestoreUserRequest $request){

        canAccessTo($this->permissions->delete);

        $user = User::find($request->input('id'));

        if($user == null){
            return response()->json([
                'message'    => 'Usuario no encontrado'
            ],404);
        }

        $user->status = 'active';
        $user->save();

        return response()->json([
            'message' => 'Restaurado',
            'action'  => 'restore',
            'status'  => 'success'
        ]);
    }
}
