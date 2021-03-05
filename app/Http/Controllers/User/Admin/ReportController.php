<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassSubject;
use App\Models\CommentStudentClass;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Period;
use App\Models\Subject;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->title = 'Reportería';
        $this->singular_title = 'Reporte';
        $this->action = 'reporting';
        $this->permissions  = (object) [
            'access'        => 'access_reporting',
            'build'         => 'build_reporting',
        ];

        $this->views        = (object) [
            'index'         => 'users.admin.pages.report.index',
            // 'create'        => 'users.admin.pages.course_student.create',
            // 'edit'          => 'users.admin.pages.course_student.edit',
            // 'show'          => 'users.admin.pages.course_student.show',
            // 'students'      => 'users.admin.pages.course_student.students'
        ];

        $this->routes       = (object) [
            'index'         => 'admin.report.index',
            'create'        => 'admin.report.build',
        ];
    }
    /**
     * Index method
     */
    public function index()
    {
        canAccessTo($this->permissions->access);
        $students = getUsersByRole('student')->get();
        $teachers = getUsersByRole('teacher')->get();
        
        $periods = Period::where('status', '!=' ,'deleted')
            ->where('status', '!=' ,'pending')
    		->orderBy('id','desc')
    		->get();

        $courses = Course::where('status', '!=', 'deleted')
            ->get();

        $subjects = Subject::where('status', '!=', 'deleted')
            ->get();

        return view('users.admin.pages.report.index')
            ->with('route',$this->routes->create)
            ->with('periods',$periods)
            ->with('courses',$courses)
            ->with('teachers',$teachers)
            ->with('subjects',$subjects);
    }
    /**
     * Build a Report
     */
    public function buildReport(Request $request)
    {
        $period_id  = $request->input('period_id');
        $teacher_id = $request->input('teacher_id');
        $subject_id = $request->input('subject_id');
        $course_id  = $request->input('course_id');
        $student_id = $request->input('student_id');

        $course_list = (new Course)->newQuery();
        if (!empty($course_id)) {
            $course_list = $course_list->whereIn('id',$course_id);
        }
        $course_list = $course_list->get();

        $periods = Period::where('status', '!=' ,'deleted')
            ->where('status', '!=' ,'pending');
        if(!empty($period_id)){
            $periods = $periods->whereIn('id', $period_id);
        }
        $periods = $periods->get();
        foreach ($periods as $key => $period) {
            $courseSubjects = CourseSubject::where('period_id', $period->id)
                ->with('teacher')
                ->with('course')
                ->with('course_students')
                ->with('course_students.student');
            if (!empty($teacher_id)) {
                $courseSubjects = $courseSubjects->whereIn('teacher_id', $teacher_id);
            }
            if (!empty($subject_id )) {
                $courseSubjects = $courseSubjects->whereIn('subject_id', $subject_id);
            }
            if (!empty($course_id)) {
                $courseSubjects = $courseSubjects->whereIn('course_id', $course_id);
            }
            $courseSubjects = $courseSubjects->get();
            foreach ($courseSubjects as $key => $cs_data) {
                
                $cs_data->class_subject = ClassSubject::where('teacher_id', $cs_data->teacher_id)->with('comments')->get();
                $cs_data->percetages = $this->calcPercentage($cs_data);
                $course = $course_list->where('id', $cs_data->course_id)->first();
                if (!isset($course->data_list) ) {
                    $course->data_list = collect();
                }
                if($cs_data->teacher != null && $cs_data->subject != null){
                    $course->data_list->push((object)[
                        'id'        => $cs_data->id,
                        'teacher'   => $cs_data->teacher,
                        'subject'   => $cs_data->subject,
                        'percetages'=> $cs_data->percetages
                    ]);
                }
            }
            $period->course_list = $course_list;
        }

        $teachers = getUsersByRole('teacher')->get();
        
        $periods_search = Period::where('status', '!=' ,'deleted')
            ->where('status', '!=' ,'pending')
    		->orderBy('id','desc')
    		->get();

        $courses = Course::where('status', '!=', 'deleted')
            ->get();

        $subjects = Subject::where('status', '!=', 'deleted')
            ->get();


        return view('users.admin.pages.report.index')
         ->with('route',$this->routes->create)
         ->with('periods',$periods_search)
         ->with('courses',$courses)
         ->with('teachers',$teachers)
         ->with('subjects',$subjects)
         ->with('reports', $periods);
        dd($periods );
        // $report_comment = CommentStudentClass::where('status', 'active')
        //     ->with('student')
        //     ->with('class_subject')
    }

    public function calcPercentage($data)
    {
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
		$size = (count($data->class_subject)==0? 1 :count($data->class_subject)) * ((count($data->course_students)== 0? 1: count($data->course_students))== 0? 1: (count($data->course_students)== 0? 1: count($data->course_students)));
        $size = $size == 0? 1:$size;
		$negative_percent = ( $negative_percent/ $size)*100;
		$positive_percent = ( $positive_percent/ $size)*100;
		$neutral_percent =   ( $neutra_percent/ $size)*100;
        if ($neutral_percent >= 800.69) {
            // dd($data->class_subject, $data->course_students, $neutra_percent);
        }
        return (object) [
            'negative_percent'  => $negative_percent,
            'positive_percent'  => $positive_percent,
            'neutral_percent'   => $neutral_percent,
        ];
    }
}
