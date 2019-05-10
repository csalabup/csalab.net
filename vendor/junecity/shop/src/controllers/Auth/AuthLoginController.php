<?php

namespace junecity\shop\Controllers\Auth;

use junecity\shop\models\User;
use junecity\shop\requests\Request;
use junecity\shop\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthLoginController extends Controller
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


    public function postLogin(\junecity\shop\requests\LoginRequest $request)
    {
        $email    = $request->input('email');
        $password = $request->input('password');

        if (\Auth::attempt(['email' => $email, 'password' => $password])) {


            return redirect()->intended('dashboard');
        }


        return redirect()->intended('auth');
    }
    

    

}
