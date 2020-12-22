<?php

namespace App\Http\Controllers\User\Admin;

use App\DataTables\TeachersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    
    public function index(TeachersDataTable $dataTable){
    	return $dataTable->render('users.pages.users');
    }
    
}
