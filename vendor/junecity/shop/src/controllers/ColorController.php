<?php

namespace junecity\shop\controllers;

use junecity\shop\controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use junecity\shop\models\Category;
use junecity\shop\models\Imager;
use junecity\shop\models\Color;
use junecity\shop\models\Item;
use junecity\shop\Requests;
use Request;
use Auth;


class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page_title = 'All Colors';

        $count = Color::where('user_id', Auth::user()->id)->count();

        $colors = Color::where('user_id', Auth::user()->id)
                 ->orderBy('created_at', 'DESC')->simplePaginate(10);
        

        return view('junecity::colors.index', compact('colors', 'count', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {   
        $page_title = 'Create a new color';

        $items = Item::where('user_id', Auth::user()->id)
                 ->orderBy('created_at', 'DESC')->simplePaginate(10);
        
        return view('junecity::colors.create', compact('items', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\ColorRequest $request)
    {
        $color = new Color;
       

        $color->user_id = Auth::user()->id;
        $color->color = $request->input('color');
        $color->description = $request->input('description');
        $color->save();


       $array = $request->input();

       $array = array_except($array, '_token');
       $array = array_except($array, 'color');   
       $array = array_except($array, 'description');
      

       list($keys, $values) = array_divide($array);

       $color->item()->sync($keys);

    
       return Redirect::route('colors');
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
        $page_title = 'Edit Color';

        $items = Item::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        
        $color = color::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $color_items = $color->item()->get();

        $merge_colors = $items->merge($color_items);

        $items = $merge_colors->unique();

        
        //return $item_categories;

        return view('junecity::colors.edit', compact('items', 'color', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ColorRequest $request, $id)
    {
        $color = Color::where('user_id', Auth::user()->id)->where('id', $id)->first();
       

        $color->user_id = Auth::user()->id;
        $color->color = $request->input('color');
        $color->description = $request->input('description');
        $color->save();


       $array = $request->input();

       $array = array_except($array, '_token');
       $array = array_except($array, '_method');
       $array = array_except($array, 'color');   
       $array = array_except($array, 'description');
      

       list($keys, $values) = array_divide($array);

       $color->item()->sync($keys);

    
       return Redirect::route('colors');
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
