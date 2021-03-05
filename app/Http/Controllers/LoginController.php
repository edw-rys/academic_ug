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

    /**
     * Método de inicio de sesión
     * Recibe las credenciales (email and password), verifica la existencia del correo en la BD
     * Si existe y no esrtá activo retorna un error.
     * Caso contrario intentará autenticarla verificando la contraseña, si todo es correcto redireccionará al dashboard.
     * Si la contraseña es errónea redirecciona al login con el error
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request){
        // obtener credenciales
        $request->merge([
            'email' => trim ( $request->input('email'))
        ]);
        $credentials = $request->only('email','password');
        $user = User::where('email', $request->input('email'))->first();
        // logear
        if($user){
            if($user->status != 'active'){
                return redirect()->route('auth.login.show')
                    ->with('errors',['El usuario está bloqueado']);
            }
        }
        if(Auth::attempt($credentials)){

            return redirect()->route('user.dashboard.index');
        }
        return redirect()->route('auth.login.show')
            ->with('errors',['Datos Incorrectos']);
    }

    /**
     * Elimina sesion y redirecciona al login
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login.show');
    }

}
