<?php

namespace junecity\shop\controllers\shops;

use junecity\shop\controllers\controller;
use Illuminate\Support\Facades\Redirect;
use junecity\shop\models\Category;
use junecity\shop\models\Original;
use junecity\shop\models\Setting;
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





class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    


    public function index($shop_name)
    {

        $shop = Setting::where('shop_name', $shop_name)->first();

        $items = Item::where('user_id', $shop->user_id)->get();

        return $items;
        
        
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        

   
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       


       
    }

   






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       
    }
}
