<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourseStudent;
use App\Models\CourseSubject;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Requests\User\Student\Class_\StoreCommentRequest;
use App\Models\CommentStudentClass;
class StudentController extends Controller
{
	/**
	 * @return 
	 */ 
    public function index()
    {
    	// Show periods and class
    	// Get periods
    	$periods = Period::where('status', '!=' ,'deleted')
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


			//CourseStudent
//			->where('student_id', auth()->user()->id)
		// Return view with data
		return response()->json($data);
    }

    public function showClass($id)
    {
		$data = CourseSubject::with('teacher')
			->where('id', $id)
			->first();
		$teacher_id = $data->teacher->id;

    	$data = CourseSubject::with('period')
			->with('course')
			->with('teacher')
			->with('subject')
			->with('course_student')
			->has('course_student')
			->with(['class_subject'=>function($query) use($teacher_id){
				$query->with('comment')->where('teacher_id', $teacher_id);
			}])
			->where('id', $id)
			->first();
		// Get data subject class


		if($data === null){
			abort(404);
		}
		// Return view with data
		return view('users.student.class.show')
    		->with('data', $data)
    		->with('percent', rand(0,100));
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
    		->first();
    	if($comment === null){
    		CommentStudentClass::create($request->all());
    	}else{
    		$comment->comment = $request->input('comment');
    		$comment->save();
    	}

    	return response()->json([
    			'message'	=> 'Guardado',
    			'status'	=> 'error'
    		], 201);
    }
}
