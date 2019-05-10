<?php

namespace junecity\shop\controllers;

use junecity\shop\controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use junecity\shop\models\Setting;
use junecity\shop\models\Original;
use junecity\shop\models\User;
use junecity\shop\requests;
use Request;
use Auth;
use Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $page_title = 'View Users';

        $auth_user = Auth::user();

        if (Gate::allows('SuperAdminAccess', $auth_user)) {
            $users = User::orderBy('created_at', 'DESC')->whereNotIn('id', [Auth::user()->id])->simplePaginate(10);

            return view('junecity::users.index', compact('users', 'page_title'));
        }

        if (Gate::allows('AdminAccess', $auth_user)) {
            
            $users = User::where('owner_id', Auth::user()->id)->orderBy('created_at', 'DESC')->simplePaginate(10);



            return view('junecity::users.index', compact('users', 'page_title'));
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    public function create()
    {
        $page_title = 'Create a new user';
        $user = Auth::user();
        
        return view('junecity::users.create', compact('page_title', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(\junecity\shop\requests\UserRequest $request)
    {
        $auth_user = Auth::user();

        if (Gate::allows('SuperAdminAccess', $auth_user)) {

        
           $password = $request->input('password');
           $password_confirmation = $request->input('password_confirmation');
   

        if ($password == $password_confirmation) {
             
            $user_id = \Auth::user()->id; 

            $user = new User;
            $user->owner_id = $user_id;
            $user->name    = $request->input('name');
            $user->email    = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->url_key = str_random(60);
            $user->api_token = str_random(60);
            $user->address = $request->input('address');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip_code = $request->input('zip_code');
            $user->phone = $request->input('phone');
            $user->role = 'Regular';
            $user->save();

            $settings = New Setting;
            $settings->user_id = $user->id; 
            $settings->shop_name = str_random(60);
            $settings->save();

            $user_update = User::findOrFail($user->id);
            $user_update->user_id = $user->id;
            $user_update->save();

            return redirect()->route('users');
        }


            
        }
        
        if (Gate::allows('AdminAccess', $auth_user)) {

        
           $password = $request->input('password');
           $password_confirmation = $request->input('password_confirmation');
   

        if ($password == $password_confirmation) {
             
            $user_id = \Auth::user()->id; 

            $user = new User;
            $user->owner_id = $user_id;
            $user->name    = $request->input('name');
            $user->email    = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->url_key = str_random(60);
            $user->api_token = str_random(60);
            $user->address = $request->input('address');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip_code = $request->input('zip_code');
            $user->phone = $request->input('phone');
            $user->role = 'Regular';
            $user->save();

            $settings = New Setting;
            $settings->user_id = $user->id; 
            $settings->shop_name = str_random(60);
            $settings->save();

            $user_update = User::findOrFail($user->id);
            $user_update->user_id = $user->id;
            $user_update->save();

            return redirect()->route('users');
        }


            
        }

       

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        

        $auth_user = Auth::user();
        

        if (Gate::allows('SuperAdminAccess', $auth_user)) {

            $user = User::findOrFail($id);

            $page_title = 'Editing: '.$user->email;

            $own_users = User::where('owner_id', $id)->get();
           
           return view('junecity::users.edit', compact('user', 'own_users' ,'page_title'));

        }
        
        if (Gate::allows('AdminAccess', $auth_user)) {

           $user = User::where('id', $id)->where('user_id', Auth::user()->id)->first();
           
           

           if ($user == ''){

              return redirect()->back();
           }
           
           $page_title = 'Editing: '.$user->email;

           return view('junecity::users.edit', compact('user', 'page_title')); 

        }

        if (Gate::allows('RegularAccess', $auth_user)) {

           $user = User::where('id', $id)->where('user_id', Auth::user()->id)->first();

           

           if ($user == ''){

              return redirect()->back();
           }

           $page_title = 'Editing: '.$user->email;

           return view('junecity::users.edit', compact('user', 'page_title')); 

        }
        
        return redirect()->back();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(requests\UserUpdateRequest $request, $id)
    {
        $auth_user = Auth::user();

        if (Gate::allows('SuperAdminAccess', $auth_user)) {
           
        $user = User::findOrFail($id);

        $user->name    = $request->input('name');
        $user->email    = $request->input('email');
       
        $user->address = $request->input('address');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->zip_code = $request->input('zip_code');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->save();

        return redirect()->back();

        }

        if (Gate::allows('AdminAccess', $auth_user)) {
           
        $user = User::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if ($user == ''){

              return redirect()->back();
        }

        $user->name    = $request->input('name');
        $user->email    = $request->input('email');
       
        $user->address = $request->input('address');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->zip_code = $request->input('zip_code');
        $user->phone = $request->input('phone');
        $user->save();
        
        return redirect()->back();

        }
       
        if (Gate::allows('RegularAccess', $auth_user)) {



        $user = User::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if ($user == ''){

              return redirect()->back();
        }
           
        $user->name    = $request->input('name');
        $user->email    = $request->input('email');
       
        $user->address = $request->input('address');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->zip_code = $request->input('zip_code');
        $user->phone = $request->input('phone');
        $user->save(); 
        
        return redirect()->back();

        }
        

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return $id;
    }
}
