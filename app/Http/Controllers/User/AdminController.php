<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\DataTables\TeachersDataTable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(TeachersDataTable $dataTable){
    	return $dataTable->render('users.pages.teachers');
    }
}
