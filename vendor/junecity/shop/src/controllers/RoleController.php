<?php

namespace junecity\shop\controllers;

use junecity\shop\controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use junecity\shop\models\Role;
use junecity\shop\models\User;
use junecity\shop\Requests;
use Request;
use Auth;
use Gate;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page_title = 'All Roles';

        $count = Role::where('user_id', Auth::user()->id)->count();

        $roles = Role::where('user_id', Auth::user()->id)
                 ->orderBy('created_at', 'DESC')->simplePaginate(10);
        

        return view('junecity::roles.index', compact('roles', 'count', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {   
        $page_title = 'Create a new roles';

        $users = User::orderBy('created_at', 'DESC')->get();
        
        return view('junecity::roles.create', compact('users', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\RoleRequest $request)
    {
        $role = new Role;
       

        $role->user_id = Auth::user()->id;
        $role->role = $request->input('role');
        $role->description = $request->input('description');
        $role->save();


       $array = $request->input();

       $array = array_except($array, '_token');
       $array = array_except($array, 'role');   
       $array = array_except($array, 'description');
      

       list($keys, $values) = array_divide($array);

       $role->user()->sync($keys);

    
       return Redirect::route('roles');
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
        $page_title = 'Edit Role';

        $users = User::orderBy('created_at', 'DESC')->get();
       
        $role = Role::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $role_users = $role->user()->get();

        $merge_roles = $users->merge($role_users);

        $users = $merge_roles->unique();

       


        return view('junecity::roles.edit', compact('role', 'users', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\RoleRequest $request, $id)
    {
       $role = Role::where('user_id', Auth::user()->id)->where('id', $id)->first();
       
       $auth_user = Auth::user();

        if (Gate::denies('SuperAdminAccess', $auth_user)) {
            return redirect()->route('roles');
        }


       $role->user_id = Auth::user()->id;
       $role->role = $request->input('role');
       $role->description = $request->input('description');
       $role->save();


       $array = $request->input();

       $array = array_except($array, '_token');
       $array = array_except($array, '_method');
       $array = array_except($array, 'role');   
       $array = array_except($array, 'description');
      

       list($keys, $values) = array_divide($array);

       $role->user()->sync($keys);

    
       return Redirect::route('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
