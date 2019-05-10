<?php

namespace junecity\shop\Controllers\Auth;

use junecity\shop\models\User;
use junecity\shop\requests\Request;
use junecity\shop\controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthLogoutController extends Controller
{

  

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function getLogout()
    {
        \Auth::logout();

        return redirect()->intended('auth');

    }
}