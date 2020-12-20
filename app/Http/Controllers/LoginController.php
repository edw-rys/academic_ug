<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginShow(){
        return view('users.login');
    }

    public function login(Request $request){
        //obtener credenciales
        $credentials = $request->only('email','password');
        //logear
        if(Auth::attempt($credentials)){

            return redirect()->route('user.dashboard.index');
        }
        return redirect()->route('auth.login.show')
        ->with('errors',['Datos Incorrectos']);
    }
//Elimina sesion
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login.show');
    }

}
