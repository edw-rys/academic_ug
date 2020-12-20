<?php

namespace App\Http\Controllers\USer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(){
    	//dd(have_permission('show_subject_student',auth()->user()->id));
    	//dd(Gate::denies('create_user'));
    	//dd(auth()->user()->can('show_subject_student'));
        return view('users.dashboard');
    }
}
