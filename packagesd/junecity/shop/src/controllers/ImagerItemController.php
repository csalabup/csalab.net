<?php

namespace junecity\shop\controllers;


use Illuminate\Support\Facades\Redirect;
use junecity\shop\controllers\controller;
use junecity\shop\models\Category;
use junecity\shop\models\Original;
use junecity\shop\models\Imager;
use junecity\shop\models\Color;
use junecity\shop\models\Item;
use junecity\shop\models\Size;
use junecity\shop\requests;
use Request;
use Image;
use Auth;



class ImagerItemController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\ItemImageRequest $request, $id)
    {
           
           
           $array = $request->input();

           $array = array_except($array, '_token');
           
           list($keys, $values) = array_divide($array);


           $item = item::where('user_id', Auth::user()->id)->where('id', $id)->first();
        

           $item->original()->sync($keys);
           

           return Redirect::route('items');



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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
       $array = $request->input();
        return $array;
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
