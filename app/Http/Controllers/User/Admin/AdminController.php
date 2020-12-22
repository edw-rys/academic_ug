<?php

namespace App\Http\Controllers\User\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(AdminDataTable $dataTable){
    	return $dataTable->render('users.pages.users');
    }

    public function edit($id){
    }
    public function update(Request $request){
    }
    public function create(){
    }
    public function destroy($id){
    }
}
