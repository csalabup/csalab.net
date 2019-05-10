<?php

namespace junecity\shop\controllers;

use junecity\shop\controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use junecity\shop\models\Category;
use junecity\shop\models\Item;
use junecity\shop\Requests;
use Request;
use Auth;


class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

        $page_title = 'All Categories';

        $count = Category::where('user_id', Auth::user()->id)->count();
    
        $categories = Category::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->simplePaginate(10);

        return view('junecity::categories.index', compact('categories', 'count', 'page_title'));

       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $page_title = 'Create a Category';

        $items = Item::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        return view('junecity::categories.create', compact('items', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CategoryRequest $request)
    {
        $category = new Category;

        $category->user_id = Auth::user()->id;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->url_link = $request->input('url_link');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->meta_title = $request->input('meta_title');
        $category->picture_id = $request->input('picture_id');
        $category->show_on_home_page = $request->input('show_on_home_page');
        $category->published = $request->input('published');
        $category->display_order = $request->input('display_order');
        $category->include_in_top_menu = $request->input('include_in_top_menu');
        $category->save();


       $array = $request->input();

       $array = array_except($array, '_token');
       $array = array_except($array, '_method');
       $array = array_except($array, 'name');   
       $array = array_except($array, 'description');
       $array = array_except($array, 'meta_keywords');
       $array = array_except($array, 'meta_description');
       $array = array_except($array, 'url_link');
       $array = array_except($array, 'meta_title');
       $array = array_except($array, 'picture_id');
       $array = array_except($array, 'show_on_home_page');
       $array = array_except($array, 'published');
       $array = array_except($array, 'display_order');
       $array = array_except($array, 'include_in_top_menu');
       


       list($keys, $values) = array_divide($array);

       $category->item()->sync($keys);

        
        return Redirect::route('categories');


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
        $items = Item::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        $category = Category::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $category_items = $category->item()->get();

        $merge_items = $items->merge($category_items);

        $items = $merge_items->unique();

        return view('junecity::categories.edit', compact('category', 'items'));
    



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CategoryRequest $request, $id)
    {
       
        $category = Category::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $category->user_id = Auth::user()->id;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->url_link = $request->input('url_link');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->meta_title = $request->input('meta_title');
        $category->picture_id = $request->input('picture_id');
        $category->show_on_home_page = $request->input('show_on_home_page');
        $category->published = $request->input('published');
        $category->display_order = $request->input('display_order');
        $category->include_in_top_menu = $request->input('include_in_top_menu');
        $category->save();



       $array = $request->input();

       $array = array_except($array, '_token');
       $array = array_except($array, '_method');
       $array = array_except($array, 'name');   
       $array = array_except($array, 'description');
       $array = array_except($array, 'meta_keywords');
       $array = array_except($array, 'meta_description');
       $array = array_except($array, 'url_link');
       $array = array_except($array, 'meta_title');
       $array = array_except($array, 'picture_id');
       $array = array_except($array, 'show_on_home_page');
       $array = array_except($array, 'published');
       $array = array_except($array, 'display_order');
       $array = array_except($array, 'include_in_top_menu');
       


       list($keys, $values) = array_divide($array);

       $category->item()->sync($keys);

        
        return Redirect::route('categories');
       
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
