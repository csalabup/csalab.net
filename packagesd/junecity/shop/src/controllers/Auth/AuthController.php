<?php

namespace junecity\shop\Controllers\Auth;

use junecity\shop\models\User;
use junecity\shop\requests\Request;
use junecity\shop\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }





    public function getLogin()
    {
        return view('junecity::auth.login');
    }


    public function postLogin(\Resquests $request)
    {
        $email    = $request->input('email');
        $password = $request->input('password');

        if (\Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('dashboard');
        }
    }
    

    public function getRegister()
    {
        return view('junecity::auth.register');
    }
    

    public function postRegister(\junecity\shop\requests\RegisterRequest $request)
    {
        $email    = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

   

        if ($password == $password_confirmation) {
            User::create([
            'email' => $email,
            'password' => bcrypt($password),
            'url_key' => str_random(60)

             ]);


            if (\Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->intended('dashboard');
            }
        }
    }



    public function getLogout()
    {
        \Auth::logout();

        return view('junecity::auth.login');
    }
}
