<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourseStudent;
use App\Models\CourseSubject;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Requests\User\Student\Class_\StoreCommentRequest;
use App\Models\CommentStudentClass;
use App\Services\ApiService;

class StudentController extends Controller
{
	private $apiService;

    /**
     * StudentController constructor.
     * @param ApiService $apiService
     */
	public function __construct(ApiService $apiService) {
		$this->apiService = $apiService;
	}
	/**
	 * @return
	 */
    public function index()
    {
    	// Show periods and class
    	// Get periods
    	$periods = Period::where('status', '!=' ,'deleted')
            ->where('status', '!=' ,'pending')
    		->orderBy('id','desc')
    		->get();

    	return view('users.student.class.index')
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
			->with('course_student')
			->has('course_student')
			->get();
		return response()->json($data);
    }

    /**
     * Mostrar los datos de una clase que se le ha sido asignado
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showClass($id)
    {
		$data = CourseSubject::with('teacher')
			->where('id', $id)
			->first();
		if($data == null){
			abort(404);
		}
		$teacher_id = $data->teacher->id;

    	$data = CourseSubject::with('period')
			->with('course')
			->with('teacher')
			->with('subject')
			->with('course_student')
			->has('course_student')
			->with(['class_subject'=>function($query) use($teacher_id){
				$query->with(['comment'=>function($query){
					$query->where('student_id', auth()->user()->id);
				}])->where('teacher_id', $teacher_id);
			}])
			->where('id', $id)
			->first();
		// Get data subject class

		if($data === null){
			abort(404);
		}
		$negative_percent = 0;
		$positive_percent = 0;
		$neutra_percent = 0;
		foreach ($data->class_subject as $key => $value) {
			if(isset($value->comment) && $value->comment){
				$negative_percent += $value->comment->negative;
				$positive_percent += $value->comment->positive;
				$neutra_percent += $value->comment->neutral;
			}
		}
		$size = count($data->class_subject);
        $size = $size == 0? 1:$size;
		$negative_percent = ( $negative_percent/ $size)*100;
		$positive_percent = ( $positive_percent/ $size)*100;
		$neutra_percent =   ( $neutra_percent/ $size)*100;
		// Return view with data
		return view('users.student.class.show')
    		->with('data', $data)
			->with('negative_percent', $negative_percent)
			->with('positive_percent', $positive_percent)
			->with('neutral_percent', $neutra_percent)
			;
    }
    /**
     * Store Comment by class and user with student role
     * @param StoreCommentRequest $request
     */
    public function storeComment(StoreCommentRequest $request)
    {
    	$dataExist = CourseSubject::where('id', $request->input('class_student_id'))->has('course_student')->first();
    	if($dataExist == null){
    		return response()->json([
    			'message'	=> 'No autorizado',
    			'status'	=> 'error'
    		],403);
    	}
    	$request->merge([
    		'student_id' => auth()->user()->id
    	]);
    	$comment = CommentStudentClass::where('student_id', auth()->user()->id)
    		->where('class_id', $request->input('class_id'))
			->where('status', 'active')
			->first();

		// Save comment
    	if($comment === null){
			$comment = CommentStudentClass::create($request->all());
    	}else{
			$comment->comment = $request->input('comment');
    		$comment->save();
		}
        /*
         * Petición hacia la api web de python
         */
		$res = $this->apiService->sendIdComment($comment->id);
    	return response()->json([
    			'message'	=> 'Guardado',
    			'status'	=> 'error'
    		], 201);
    }
}
