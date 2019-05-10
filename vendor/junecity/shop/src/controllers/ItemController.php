<?php

namespace junecity\shop\controllers;

use junecity\shop\controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use junecity\shop\models\Category;
use junecity\shop\models\Original;
use junecity\shop\models\Imager;
use junecity\shop\models\Color;
use junecity\shop\models\Item;
use junecity\shop\models\Size;
use junecity\shop\requests;
use Request;
use Storage;
use Image;
use File;
use Auth;
use AWS;





class ItemController extends Controller
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
        $page_title = 'View all items';

        $count = Item::where('user_id', Auth::user()->id)->count();
    
        $items = Item::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->simplePaginate(10);
        

        $url_key = Auth::user()->settings['url_key'];

       

        //$disk = Storage::disk('s3');

        
        //$originals = Original::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->simplePaginate(10);
        




        return view('junecity::items.index', compact('items', 'count', 'page_title','item_originals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    public function create()
    {

        $page_title = 'Create a new item';

        $categories = Category::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        
        $sizes = Item::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        return view('junecity::items.create', compact('categories', 'sizes', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\ItemRequest $request)
    {
        

        //$url_key = Auth::user()->settings['url_key'];

        $item = New Item;
        $item->user_id = Auth::user()->id;
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->meta_keywords = $request->input('meta_keywords');
        $item->meta_description = $request->input('meta_description');
        $item->meta_title = $request->input('meta_title');
        $item->sku = $request->input('sku');
        $item->manufacturer_part_number = $request->input('manufacturer_part_number');
        $item->gtin = $request->input('gtin');
        $item->stock_quantity = $request->input('stock_quantity');
        $item->order_minimum_quantity = $request->input('order_minimum_quantity');
        $item->order_maximum_quantity = $request->input('order_maximum_quantity');
        $item->published = $request->input('published');
        $item->show_on_home_page = $request->input('show_on_home_page');
        $item->has_image = false;
        $item->price = $request->input('price');
        $item->old_price = $request->input('old_price');
        $item->weight = $request->input('weight');
        $item->length = $request->input('length');
        $item->width = $request->input('width');
        $item->height = $request->input('height');
        $item->display_order = $request->input('display_order');
        $item->disable_buy_button = $request->input('disable_buy_button');

        
        $item->save();


        




        $array = $request->input();

        $array = array_except($array, '_token');
        $array = array_except($array, 'name');
        $array = array_except($array, 'description');
        $array = array_except($array, 'meta_keywords');
        $array = array_except($array, 'meta_description');
        $array = array_except($array, 'meta_title');
        $array = array_except($array, 'sku');
        $array = array_except($array, 'manufacturer_part_number');
        $array = array_except($array, 'gtin');
        $array = array_except($array, 'stock_quantity');
        $array = array_except($array, 'order_minimum_quantity');
        $array = array_except($array, 'order_maximum_quantity');
        $array = array_except($array, 'published');
        $array = array_except($array, 'show_on_home_page');
        $array = array_except($array, 'price');
        $array = array_except($array, 'old_price');
        $array = array_except($array, 'weight');
        $array = array_except($array, 'length');
        $array = array_except($array, 'width');
        $array = array_except($array, 'height');
        $array = array_except($array, 'display_order');
        $array = array_except($array, 'disable_buy_button');
        $array = array_except($array, 'upload_file');


        list($keys, $values) = array_divide($array);

        $item->category()->sync($keys);

    
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
        $page_title = 'Edit item';
        
        $categories = Category::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        
        $item = item::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $item_categories = $item->category()->get();

        $colors = $item->color()->get();

        $sizes = $item->size()->get();

        $sizes_check = $item->size()->first();

        $merge_categories = $categories->merge($item_categories);

        $categories = $merge_categories->unique();

        //$originals = Original::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->simplePaginate(10);
        //return $item_categories;
        $item_originals = $item->original()->get();

        return view('junecity::items.edit', compact('categories', 'item', 'page_title', 'colors', 'sizes', 'sizes_check', 'item_originals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(requests\ItemRequest $request, $id)
    {
       


        $item = item::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $item->user_id = Auth::user()->id;
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->meta_keywords = $request->input('meta_keywords');
        $item->meta_description = $request->input('meta_description');
        $item->meta_title = $request->input('meta_title');
        $item->sku = $request->input('sku');
        $item->manufacturer_part_number = $request->input('manufacturer_part_number');
        $item->gtin = $request->input('gtin');
        $item->stock_quantity = $request->input('stock_quantity');
        $item->order_minimum_quantity = $request->input('order_minimum_quantity');
        $item->order_maximum_quantity = $request->input('order_maximum_quantity');
        $item->published = $request->input('published');
        $item->show_on_home_page = $request->input('show_on_home_page');
        $item->price = $request->input('price');
        $item->old_price = $request->input('old_price');
        $item->weight = $request->input('weight');
        $item->length = $request->input('length');
        $item->width = $request->input('width');
        $item->height = $request->input('height');
        $item->display_order = $request->input('display_order');
        $item->disable_buy_button = $request->input('disable_buy_button');
        $item->save();

        
        



        //$imager = new Imager;
        //$imager->user_id = Auth::user()->id;
        //$imager->original_url = 'test';

        //$item->Imagers()->save($imager);


        $array = $request->input();

        $array = array_except($array, '_token');
        $array = array_except($array, '_method');
        $array = array_except($array, 'name');
        $array = array_except($array, 'description');
        $array = array_except($array, 'meta_keywords');
        $array = array_except($array, 'meta_description');
        $array = array_except($array, 'meta_title');
        $array = array_except($array, 'sku');
        $array = array_except($array, 'manufacturer_part_number');
        $array = array_except($array, 'gtin');
        $array = array_except($array, 'stock_quantity');
        $array = array_except($array, 'order_minimum_quantity');
        $array = array_except($array, 'order_maximum_quantity');
        $array = array_except($array, 'published');
        $array = array_except($array, 'show_on_home_page');
        $array = array_except($array, 'price');
        $array = array_except($array, 'old_price');
        $array = array_except($array, 'weight');
        $array = array_except($array, 'length');
        $array = array_except($array, 'width');
        $array = array_except($array, 'height');
        $array = array_except($array, 'display_order');
        $array = array_except($array, 'disable_buy_button');


        list($keys, $values) = array_divide($array);

        $item->category()->sync($keys);

    
        return Redirect::route('items');
    }

    /**
     * Image update.
     *
     * @param  int  $id
     * @return Response
     */
 public function imageupdate(Requests\ItemRequest $request)
 {    
 //      $original = Original::where('user_id', Auth::user()->id)->where('id', $original_id)->first();
 //      $item = item::where('user_id', Auth::user()->id)->where('id', $id)->first();
 //      $imager = new Imager;
 //      $imager->user_id = Auth::user()->id;
 //      $imager->original_url = $original->original_url;

 //      $item->Imagers()->save($imager);

 //      //return Redirect::route('items');

 //      $itemd = Item::find(2);

 //      
 //
 //       dd($itemd->imagers);      
        $array = $request->input();
        return $array;

  }



    public function images($id)
    {    
       $item = item::where('user_id', Auth::user()->id)->where('id', $id)->first();
       $originals = Original::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
       
       $count = Original::where('user_id', Auth::user()->id)->count(); 

       $item_originals = $item->original()->get();

       $merge_originals = $originals->merge($item_originals);

       $originals = $merge_originals->unique();

        return view('junecity::items.images', compact('originals','item', 'count'));

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
