<?php

namespace junecity\shop\controllers;

use junecity\shop\controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use junecity\shop\models\Setting;
use junecity\shop\models\Original;
use junecity\shop\requests;
use Request;
use Auth;



class SettingsController extends Controller
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
        $page_title = 'View Settings';

        $settings = Setting::where('user_id', Auth::user()->id)->first();

        
        $originals = Original::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
       
        //$count = Original::where('user_id', Auth::user()->id)->count(); 

        $settings_originals = $settings->original()->get();

        $merge_originals = $originals->merge($settings_originals);

        $originals = $merge_originals->unique();

        return view('junecity::settings.index', compact('originals','settings','page_title'));
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
    public function store(Requests\SettingsRequest $request)
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
    public function update(requests\SettingsRequest $request, $id)
    {
       
        $settings = Setting::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $settings->user_id = Auth::user()->id;
        
        $settings->business_name = $request->input('business_name');
        $settings->business_about = $request->input('business_about');
        $settings->business_address = $request->input('business_address');
        $settings->business_address2 = $request->input('business_address2');
        $settings->business_city = $request->input('business_city');
        $settings->business_state = $request->input('business_state');
        $settings->business_zip_code = $request->input('business_zip_code');
        $settings->business_phone = $request->input('business_phone');


        
        $settings->business_website = $request->input('business_website');

        $settings->business_facebook_page = $request->input('business_facebook_page');
        $settings->business_twitter_page = $request->input('business_twitter_page');

        $settings->open_monday = $request->input('open_monday');
        $settings->close_monday = $request->input('close_monday');

        $settings->open_tuesday = $request->input('open_tuesday');
        $settings->close_tuesday = $request->input('close_tuesday');

        $settings->open_wednesday = $request->input('open_wednesday');
        $settings->close_wednesday = $request->input('close_wednesday');

        $settings->open_thursday = $request->input('open_thursday');
        $settings->close_thursday = $request->input('close_thursday');

        $settings->open_friday = $request->input('open_friday');
        $settings->close_friday = $request->input('close_friday');

        $settings->open_saturday = $request->input('open_saturday');
        $settings->close_saturday = $request->input('close_saturday');

        $settings->open_sunday = $request->input('open_sunday');
        $settings->close_sunday = $request->input('close_sunday');

        $shop_name = $request->input('shop_name');
        $shop_name = str_slug($shop_name);

        $settings->shop_name = $shop_name;


        $settings->tax = $request->input('tax');
        $settings->shipping = $request->input('shipping');  

        $settings->stripe_secret_key = $request->input('stripe_secret_key');
        $settings->stripe_public_key = $request->input('stripe_public_key'); 

        $settings->save();    



         $array = $request->input();

        $array = array_except($array, '_token');
        $array = array_except($array, '_method');
        $array = array_except($array, 'business_name');
        $array = array_except($array, 'business_about');
        $array = array_except($array, 'business_address');
        $array = array_except($array, 'business_address2');
        $array = array_except($array, 'business_city');
        $array = array_except($array, 'business_state');
        $array = array_except($array, 'business_zip_code');
        $array = array_except($array, 'business_phone');
        $array = array_except($array, 'business_website');
        $array = array_except($array, 'business_facebook_page');
        $array = array_except($array, 'business_twitter_page');

        $array = array_except($array, 'open_monday');
        $array = array_except($array, 'close_monday');

        $array = array_except($array, 'open_tuesday');
        $array = array_except($array, 'close_tuesday');

        $array = array_except($array, 'open_wednesday');
        $array = array_except($array, 'close_wednesday');

        $array = array_except($array, 'open_thursday');
        $array = array_except($array, 'close_thursday');

        $array = array_except($array, 'open_friday');
        $array = array_except($array, 'close_friday');

        $array = array_except($array, 'open_saturday');
        $array = array_except($array, 'close_saturday');

        $array = array_except($array, 'open_sunday');
        $array = array_except($array, 'close_sunday');

        $array = array_except($array, 'shop_name');
        $array = array_except($array, 'tax');
        $array = array_except($array, 'shipping');
        $array = array_except($array, 'stripe_secret_key');
        $array = array_except($array, 'stripe_public_key');

        list($keys, $values) = array_divide($array);

        $settings->original()->sync($keys);
        
            
                        
        return Redirect::route('settings');
        
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
