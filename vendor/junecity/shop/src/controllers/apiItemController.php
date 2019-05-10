<?php

namespace junecity\shop\controllers;

use junecity\shop\controllers\APIController;
use junecity\shop\controllers\controller;
use junecity\Services\ItemTransformer;
use junecity\shop\models\Item;
use junecity\shop\models\User;
use Illuminate\shop\Request;
use junecity\shop\Requests;
use Response;
use Input;



class apiItemController extends APIController
{
    
     protected $itemTransformer;

     function __construct(ItemTransformer $itemTransformer)
     {
        $this->itemTransformer = $itemTransformer;

        $this->middleware('auth.basic', ['on' => 'post']);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $items = Item::where('user_id', 1)->get();

        dd(get_class_methods($items));

        return $this->respond([

            'Items' => $this->itemTransformer->transformCollection($items->all())


            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Input::get('name') or ! Input::get('description'))

        {

              return $this->setStatusCode(422)
              ->respondWithError('Parameter failed failed validation');

        }

        //return $request;

        $user = User::where('email', $request->input('Php-Auth-User'));
        
        $item = new Item;
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->user_id = $user->id;
        $item->save();

        //Item::create(Input::all());


        
        //return $this->respondCreated('Item was successfully created.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        
        if ( ! $item )

        {
            return $this->respondNotFound('Item does not exist.');
                
        }


            return $this->respond([

               'Items' => $this->itemTransformer->transform($item)


               ]);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    

    



}
