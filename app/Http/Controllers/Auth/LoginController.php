<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        login();
    }

    public function login(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $contraseña = DB::table('usuario')->select('password')->where('Email','=',$email)->first();
    
        if($contraseña->password==$password){
            $usuario = DB::table('usuario')->where('Email','=',$email)->first();
            session_start();
            if(isset($_SESSION["email"])) return "está seteada en el controller";
            $_SESSION["email"] = $email;
            $_SESSION["admin"] = $contraseña->esAdmin;
            return view('/inicio',['usuario'=>$usuario]);
        }else{
            return back()
            ->withErrors(['email' => trans('auth.failed')])
            ->withInput(request(['email']));
        }
    }
}
