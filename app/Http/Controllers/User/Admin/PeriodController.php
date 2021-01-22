<?php

namespace App\Http\Controllers\User\Admin;

use App\DataTables\PeriodDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Period\DestroyPeriodRequest;
use App\Http\Requests\Admin\Period\FinalizePeriodRequest;
use App\Http\Requests\Admin\Period\RestorePeriodRequest;
use App\Http\Requests\Admin\Period\StorePeriodRequest;
use App\Http\Requests\Admin\Period\UpdatePeriodRequest;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->title = 'Periodos';
        $this->singular_title = 'Periodo';
        $this->action = 'period';
        $this->permissions  = (object) [
            'access'        => 'access_period',
            'create'        => 'create_period',
            'edit'          => 'edit_period',
            'delete'        => 'delete_period',
            'restore'       => 'active_period',
            'finalize'      => 'finalize_period',
        ];

        $this->views        = (object) [
            'index'         => 'users.admin.pages.period.index',
            'create'        => 'users.admin.pages.period.create',
            'edit'          => 'users.admin.pages.period.edit',
            'show'          => 'users.admin.pages.period.show'
        ];

        $this->routes       = (object) [
            'index'         => 'admin.period.index',
            'create'        => 'admin.period.create',
            'edit'          => 'admin.period.edit',
            'show'          => 'admin.period.show'
        ];
    }


    /**
     * List all items
     *
     * @param PeriodDataTable $dataTable
     * @return mixed
     */
    public function index(PeriodDataTable $dataTable){
        
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
            ->with('route', 'admin.period.store')
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param StorePeriodRequest $request
     * @return JsonResponse
     */
    public function store(StorePeriodRequest $request){
        
        canAccessTo($this->permissions->create);

        $request->merge([
            'created_at'    => Carbon::now(),
            'status'        => 'pending',
            'start_date'    => Carbon::createFromFormat(config('app_academic.setting.date_format'), $request->input('start_date'))->toDateString(),
            'end_date'      => Carbon::createFromFormat(config('app_academic.setting.date_format'), $request->input('end_date'))->toDateString(),
        ]);

        Period::create($request->all());

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

        $item = Period::find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Periodo no encontrado'
            ],404);
        }

        return view($this->views->edit)
            ->with('item', $item)
            ->with('route', 'admin.period.update')
            ->with('action', $this->action);
    }

    /**
     * Update an item
     *
     * @param UpdatePeriodRequest $request
     * @return JsonResponse
     */
    public function update(UpdatePeriodRequest $request){

        canAccessTo($this->permissions->edit);

        $request->merge([
            'updated_at'    => Carbon::now(),
            'start_date'    => Carbon::createFromFormat(config('app_academic.setting.date_format'), $request->input('start_date'))->toDateString(),
            'end_date'      => Carbon::createFromFormat(config('app_academic.setting.date_format'), $request->input('end_date'))->toDateString(),
        ]);

        $item = Period::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Periodo no encontrado'
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
     * @param DestroyPeriodRequest $request
     * @return JsonResponse
     */
    public function destroy(DestroyPeriodRequest $request, $id){

        canAccessTo($this->permissions->delete);

        $item = Period::find($id);
        
        if($item == null){
            return response()->json([
                'message'    => 'Periodo no encontrado'
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
     * @param RestorePeriodRequest $request
     * @return JsonResponse
     */
    public function restore(RestorePeriodRequest $request){
        
        canAccessTo($this->permissions->restore);

        $period = Period::where('status', 'active')->first();
        if($period !== null){
            return response()->json([
                'message'    => 'No se puede activar el periodo'
            ],400);
        }
        $item = Period::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Periodo no encontrado'
            ],404);
        }

        $item->status = 'active';
        $item->save();

        return response()->json([
            'message' => 'Habilitado',
            'action'  => 'restore',
            'status'  => 'success'
        ]);
    }
    /**
     * Finalize an item
     *
     * @param FinalizePeriodRequest $request
     * @return JsonResponse
     */
    public function finalize(FinalizePeriodRequest $request){

        canAccessTo($this->permissions->finalize);

        $item = Period::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Periodo no encontrado'
            ],404);
        }
       
        $item->status = 'finalized';
        $item->save();
        
        return response()->json([
            'message' => 'Finalizado',
            'action'  => 'restore',
            'status'  => 'success'
        ]);
    }
}
