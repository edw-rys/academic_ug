<?php

namespace App\Http\Controllers\User\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicStoreRequest;
use App\Models\ClassSubject;
use App\Models\CourseStudent;
use App\Models\CourseSubject;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AcademicController extends Controller
{

    /**
	 * @return view
	 */
    public function index()
    {
    	// Show periods and class
    	// Get periods
    	$periods = Period::where('status', '!=' ,'deleted')
            ->where('status', '!=' ,'pending')
    		->orderBy('id','desc')
    		->get();

    	return view('users.teacher.class.index')
    		->with('periods', $periods);
    }

    /**
     * Get view of class in a peirod
     * @param $period_id
     * @return view
     */
    public function classSubject($period_id){
		$data = CourseSubject::where('period_id', $period_id)
			->with('period')
			->with('course')
			->with('subject')
			->with('subject')
			->where('teacher_id', auth()->user()->id)
			->get();
		return response()->json($data);
    }
    /**
     * Mostrar los datos de una clase que se le ha sido asignado
     * @param $id
     * @return view
     */
    public function showClass($id)
    {
		// Get data subject class
    	$data = CourseSubject::with('period')
			->with('course')
			->with('teacher')
			->with('subject')
			->with('course_students')
			->with('course_students.student')
			->with(['class_subject'=>function($query){
				$query->where('teacher_id', auth()->user()->id)
					->with('comments');
			}])
			->where('teacher_id', auth()->user()->id)
			->where('id', $id)
			->first();

		if($data === null){
			abort(404);
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
		$size = count($data->class_subject) * (count($data->course_students)== 0? 1: count($data->course_students));
        $size = $size == 0? 1:$size;
		$negative_percent = ( $negative_percent/ $size)*100;
		$positive_percent = ( $positive_percent/ $size)*100;
		$neutra_percent =   ( $neutra_percent/ $size)*100;
		// Return view with data
		return view('users.teacher.class.show')
    		->with('data', $data)
    		->with('negative_percent', $negative_percent)
			->with('positive_percent', $positive_percent)
			->with('neutral_percent', $neutra_percent);
	}
	/**
	 * ELIMINAR LUEGO
	 */
	public function store(AcademicStoreRequest $request)
	{
		$id_arr = $request->input('id');
		$values = $request->input('qualification');
		if( count($id_arr) == count($values)){
			// Continue
			for ($i=0; $i < count($id_arr) ; $i++) {
				$data = CourseStudent::find($id_arr[$i]);
				if($data != null){
					$data->negative_percentage = $values[$i];
					$data->save();
				}
			}
			return redirect()->back();
		}
		return redirect()->back()->with('errors',['Datos no válidos']);
	}

	/**
	 * Create class
	 * @param $request
	 * @return redirect
	 */
	public function createClass(Request $request)
	{
		$request->merge([
			'created_at'=> Carbon::now(),
			'status'	=> 1,
			'teacher_id'	=> auth()->user()->id
		]);
		ClassSubject::create($request->all());
		return redirect()->back();
	}

	/**
	 * Create class
	 * @param $request
	 * @return redirect
	 */
	public function massCreateClass(Request $request)
	{
		$list = explode(PHP_EOL ,$request->input('name'));
		foreach ($list as $key => $value) {
			if(empty($value)){
				continue;
			}
			$request->merge([
				'created_at'=> Carbon::now(),
				'status'	=> 1,
				'teacher_id'	=> auth()->user()->id,
				'name'		=> $value
			]);
			ClassSubject::create($request->all());
		}
		return redirect()->back();
	}

}
