<?php

namespace App\Http\Controllers\USer;

use App\Http\Controllers\Controller;
use App\Models\ClassSubject;
use App\Models\CourseStudent;
use App\Models\CourseSubject;
use App\Models\Period;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
    	// Mostar vista y enviar datos según el rol
        return view('users.dashboard')->with('data', $this->getDataByRole());
    }
    /**
     * Get data for dashboard view
     * @return array
     */
    public function getDataByRole()
    {
        $data = (object)[
            'period'=> Period::where('status','active')->get()->last()
        ];
        // Obtener datos según el rol de estudiante
        if(auth()->user()->hasRole('student')){
            /**
             * Get subject
             */
            $subjects = CourseSubject::where('period_id', $data->period->id)
                ->with('period')
                ->with('course')
                ->with('subject')
                ->with('course_student')
                ->has('course_student')
                ->with('class_subject')
                ->with('class_subject.comments')
                ->get();

            $data->subjects = $subjects;
            /**
             * Get classes
             */
            $idSubjects = $subjects->map(function ($subject) {
                return $subject->id;
            });
            $data->classes = ClassSubject::whereIn('course_subject_id',$idSubjects)
                ->orderBy('id','desc')
                ->with('course_subject')
                ->with('course_subject.subject')
                ->take(5)
                ->get();
            $data->routeinit = 'student';
        }
        // Obtener datos según el rol de profesor
        if(auth()->user()->hasRole('teacher')){
            $subjects = CourseSubject::with('period')
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
                ->get();
            $data->subjects = $subjects;
            $data->routeinit = 'teacher';
        }
        // Obtener datos según el rol de administrador
        if(auth()->user()->hasRole('admin')){
            $data->routeinit = 'admin';
        }
        return $data;
    }
    /**
     * Get data in json format | comments
     */
    public function getDataGraphic()
    {
        $data = [];
        // Obtener datos según el rol de administrador
        if(auth()->user()->hasRole('admin')){
            $periods = Period::where('status', '!=', 'deleted')->get();
            foreach ($periods as $key => $period) {
                /**
                 * Get comments
                 */
                $comments = [];
                $subjects = CourseSubject::where('period_id', $period->id)
                    ->with('class_subject')
                    ->with('class_subject.comments')
                    ->get();

                array_push($data, $this->calcTotatPercentage($subjects, $period));
            }
        }// Obtener datos según el rol de profesor
        elseif (auth()->user()->hasRole('teacher')) {
            $periods_ids = CourseSubject::select('period_id')->where('teacher_id', auth()->user()->id)->groupBy('period_id')->get();
            $periods = Period::where('status', '!=', 'deleted')->whereIn('id', $periods_ids->map(function($period){
                return $period->period_id;
            })->toArray())->get();
            // dd($periods[0]);
            foreach ($periods as $key => $period) {

                $subjects = CourseSubject::where('period_id', $period->id)
                    ->with(['class_subject'=>function($query){
                        $query->where('teacher_id', auth()->user()->id)
                            ->with('comments');
                    }])
                    ->where('teacher_id', auth()->user()->id)
                    ->get();
                array_push($data, $this->calcTotatPercentage($subjects, $period));
            }
        }// Obtener datos según el rol de estudiante
        elseif (auth()->user()->hasRole('student')) {
            $periods_ids = CourseStudent::select('period_id')->where('student_id', auth()->user()->id)->groupBy('period_id')->get();
            $periods = Period::where('status', '!=', 'deleted')->whereIn('id', $periods_ids->map(function($period){
                return $period->period_id;
            })->toArray())->get();
            foreach ($periods as $key => $period) {
                $subjects = CourseSubject::where('period_id', $period->id)
                    ->has('course_student')
                    ->with(['class_subject'=>function($query) {
                        $query->with(['comment'=>function($query){
                            $query->where('student_id', auth()->user()->id);
                        }]);
                    }])
                    ->get();
                array_push($data, $this->calcTotatPercentage($subjects, $period));
            }
        }
        if(count($data) <=1){
            array_unshift($data, [
                'negative_percent'=> 0,
                'neutral_percent' => 0,
                'period'=> [
                    'id'        => 0,
                    'start_date'=> '',
                    'end_date'  => '',
                    'finalized' => '',
                    'name'      => '',
                ],
                'positive_percent' => 0
            ]);
        }
        return $data;
    }

    /**
     * Cálculo del procentaje de negatividad, positivismo y neutral de una frase
     * @param $subjects
     * @param $period
     * @return object
     */
    public function calcTotatPercentage($subjects, $period)
    {
        $negative_percent = 0;
        $positive_percent = 0;
        $neutra_percent = 0;
        $size = 0;
        foreach ($subjects as $key => $item) {
            foreach ($item->class_subject as $key => $cs) {
                foreach ($cs->comments as $key => $comment) {
                    $negative_percent += $comment->negative;
                    $positive_percent += $comment->positive;
                    $neutra_percent += $comment->neutral;
                    $size += 1;
                }
            }
        }
        $size = $size == 0 ? 1 : $size;
        $negative_percent = ( $negative_percent/ $size)*100;
        $positive_percent = ( $positive_percent/ $size)*100;
        $neutra_percent =   ( $neutra_percent/ $size)*100;

        return (object) [
            'period'            => $period,
            'positive_percent'  => $positive_percent,
            'negative_percent'  => $negative_percent,
            'neutral_percent'   => $neutra_percent
        ];
    }
}
