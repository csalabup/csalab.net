<?php

namespace junecity\shop\controllers;


use junecity\shop\controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use junecity\shop\models\Category;
use junecity\shop\models\Imager;
use junecity\shop\models\Item;
use junecity\shop\models\Size;
use junecity\shop\requests;
use Request;
use Auth;


class SizeController extends Controller
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
      
        $page_title = 'All Sizes';

        $count = Size::where('user_id', Auth::user()->id)->count();

        $sizes = Size::where('user_id', Auth::user()->id)
                 ->orderBy('created_at', 'DESC')->simplePaginate(10);
        

        return view('junecity::sizes.index', compact('sizes', 'count', 'page_title'));

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $items = Item::where('user_id', Auth::user()->id)
                 ->orderBy('created_at', 'DESC')->simplePaginate(10);
        
        return view('junecity::sizes.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\SizeRequest $request)
    {
        $size = new Size;
       

        $size->user_id = Auth::user()->id;
        $size->size = $request->input('size');
        $size->description = $request->input('description');
        $size->save();


       $array = $request->input();

       $array = array_except($array, '_token');
       $array = array_except($array, 'size');   
       $array = array_except($array, 'description');
      

       list($keys, $values) = array_divide($array);

       $size->item()->sync($keys);

    
       return Redirect::route('sizes');
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
        $page_title = 'Edit Size';

        $items = Item::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        
        $size = size::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $size_items = $size->item()->get();

        $merge_items = $items->merge($size_items);

        $items = $merge_items->unique();

        
        //return $item_categories;

        return view('junecity::sizes.edit', compact('items', 'size', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\SizeRequest $request, $id)
    {
        $size = Size::where('user_id', Auth::user()->id)->where('id', $id)->first();
       

        $size->user_id = Auth::user()->id;
        $size->size = $request->input('size');
        $size->description = $request->input('description');
        $size->save();


       $array = $request->input();

       $array = array_except($array, '_token');
       $array = array_except($array, '_method');
       $array = array_except($array, 'size');   
       $array = array_except($array, 'description');
      

       list($keys, $values) = array_divide($array);

       $size->item()->sync($keys);

    
       return Redirect::route('sizes');
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
