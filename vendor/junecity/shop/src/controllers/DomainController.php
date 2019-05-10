<?php

namespace junecity\shop\controllers;


use Illuminate\Pagination\LengthAwarePaginator;
use junecity\shop\controllers\controller;
use junecity\shop\jobs\UpdateResizeImage;
use junecity\shop\services\S3upload;
use junecity\shop\jobs\ResizeImage;
use junecity\shop\jobs\DeleteImage;
use Illuminate\Support\Collection;
use junecity\shop\models\Original;
use Illuminate\Http\Request;
use junecity\shop\requests;
use junecity\shop\models\Imager;
use junecity\shop\models\Item;
use Activity;
use Storage;
use Image;
use Auth;
use Log;
use Aws\Route53Domains\Route53DomainsClient;





class DomainController extends Controller
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
    public function index(Request $request)
    {
        //$access_key         = "AKIAIFMAPL6E7UCR2TTA"; //Access Key
        //$secret_key         = "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"; //Secret Key

        

         $route53 = new Route53DomainsClient([
           'version' => 'latest',
           'region'  => 'us-east-1'
         ]);

        $result = $route53->checkDomainAvailability(array('DomainName' => 'bestemors.com'));

        $data = $result->search('Availability');

        return $data;

        //return view('junecity::domains.index', compact('result'));

        

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
    public function show(Request $request)
    {
        
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
