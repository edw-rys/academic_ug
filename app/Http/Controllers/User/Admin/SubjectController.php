<?php

namespace App\Http\Controllers\User\Admin;

use App\DataTables\SubjectDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subject\DestroySubjectRequest;
use App\Http\Requests\Admin\Subject\RestoreSubjectRequest;
use App\Http\Requests\Admin\Subject\StoreSubjectRequest;
use App\Http\Requests\Admin\Subject\UpdateSubjectRequest;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->title = 'Asignaturas';
        $this->singular_title = 'Asignatura';
        $this->action = 'subject';
        $this->permissions  = (object) [
            'access'        => 'access_subject',
            'create'        => 'create_subject',
            'edit'          => 'edit_subject',
            'delete'        => 'delete_subject',
            'restore'       => 'restore_subject',
        ];

        $this->views        = (object) [
            'index'         => 'users.admin.pages.subject.index',
            'create'        => 'users.admin.pages.subject.create',
            'edit'          => 'users.admin.pages.subject.edit',
            'show'          => 'users.admin.pages.subject.show'
        ];

        $this->routes       = (object) [
            'index'         => 'admin.subject.index',
            'create'        => 'admin.subject.create',
            'edit'          => 'admin.subject.edit',
            'show'          => 'admin.subject.show'
        ];
    }


    /**
     * List all items
     *
     * @param SubjectDataTable $dataTable
     * @return mixed
     */
    public function index(SubjectDataTable $dataTable){
        
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
            ->with('route', 'admin.subject.store')
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param StoreSubjectRequest $request
     * @return JsonResponse
     */
    public function store(StoreSubjectRequest $request){
        
        canAccessTo($this->permissions->create);

        $request->merge([
            'created_at' => Carbon::now(),
        ]);

        Subject::create($request->all());

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

        $item = Subject::find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Asignatura no encontrada'
            ],404);
        }

        return view($this->views->edit)
            ->with('item', $item)
            ->with('route', 'admin.subject.update')
            ->with('action', $this->action);
    }

    /**
     * Update an item
     *
     * @param UpdateSubjectRequest $request
     * @return JsonResponse
     */
    public function update(UpdateSubjectRequest $request){

        canAccessTo($this->permissions->edit);

        $item = Subject::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Asignatura no encontrada'
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
     * @param DestroySubjectRequest $request
     * @return JsonResponse
     */
    public function destroy(DestroySubjectRequest $request, $id){

        canAccessTo($this->permissions->delete);

        $item = Subject::find($id);
        
        if($item == null){
            return response()->json([
                'message'    => 'Asignatura no encontrada'
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
     * Destroy an item
     *
     * @param RestoreSubjectRequest $request
     * @return JsonResponse
     */
    public function restore(RestoreSubjectRequest $request){

        canAccessTo($this->permissions->delete);

        $item = Subject::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Asignatura no encontrada'
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
