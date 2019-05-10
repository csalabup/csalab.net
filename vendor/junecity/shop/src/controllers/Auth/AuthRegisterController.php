<?php

namespace junecity\shop\Controllers\Auth;

use junecity\shop\models\User;
use junecity\shop\models\Setting;
use junecity\shop\requests\Request;
use junecity\shop\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthRegisterController extends Controller
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



    public function getRegister()
    {
        return view('junecity::auth.register');
    }
    

    public function postRegister(\junecity\shop\requests\RegisterRequest $request)
    {
        $name    = $request->input('name');
        $email    = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

   

        if ($password == $password_confirmation) {
            User::create([
            'name' => $name,    
            'email' => $email,
            'password' => bcrypt($password),
            'url_key' => str_random(60),
            'api_token' => str_random(60),
            'role' => 'Regular',

             ]);


            if (\Auth::attempt(['email' => $email, 'password' => $password])) {
                
                $settings = New Setting;
                $settings->user_id = \Auth::user()->id; 
                $settings->shop_name = str_random(60);
                $settings->save();

                $user = User::where('id', \Auth::user()->id)->first();
                $user->user_id = \Auth::user()->id;
                $user->save();


                return redirect()->intended('dashboard');
            }
        }


        return redirect()->intended('get-register');
    }


}
