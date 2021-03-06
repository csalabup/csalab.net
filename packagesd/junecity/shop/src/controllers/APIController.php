<?php

namespace junecity\shop\controllers;

use junecity\shop\controllers\controller;
use junecity\Services\ItemTransformer;
use junecity\shop\models\Item;
use Illuminate\Http\Request;
use junecity\shop\requests;
use Response;

class APIController extends Controller
{

	protected $statusCode = 200;



    public function getStatusCode()
    {

    	return $this->statusCode;
    }



    public function setStatusCode($statusCode){

    	$this->statusCode = $statusCode;

    	return $this;
    }


    public function respondNotFound($message = 'Not Found')

    {
    	return $this->setStatusCode(404)->respondWithError($message);

    }


    public function respond($data, $headers = [])
    
    {
    	return Response::json($data, $this->getStatusCode(), $headers);
    }

    
    public function respondWithError($message)
    {

    	return $this->respond([
            
            'error' => [

                'message' => $message,

                'status_code' => $this->getStatusCode()

            ]

    		]);

    }


    protected function respondCreated($message)
    {
        return $this->setStatusCode(201)->respond([
              

              'message' => $message

            ]);
    }







}
    