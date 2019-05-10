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






class MediaController extends Controller
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
        $access_key         = "AKIAIFMAPL6E7UCR2TTA"; //Access Key
        $secret_key         = "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"; //Secret Key
        $bucket             = "junecity.com"; //bucket name
        $region             = "us-east-1"; //bucket region
        $success_redirect   = "http://dream.app:1234/dashboard/media/store"; //URL to which the client is redirected upon success (currently self)
        $allowd_file_size   = "11048579"; //1 MB allowed Size
        $url_key            = Auth::user()->url_key;
        $path               = 'clients/services/'.$url_key.'/images';

        $S3upload = new S3upload($access_key, $secret_key, $bucket, $region, $success_redirect, $allowd_file_size, $url_key, $path);
         
        $upload = $S3upload->Upload();
        
        $url_key = Auth::user()->url_key;

        $small_urls = Original::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->simplePaginate(10);
        
        $count = Original::where('user_id', Auth::user()->id)->count();
        
        return view('junecity::media.index', compact('small_urls','path','bucket','success_redirect','region', 'access_key', 'upload', 'url_key', 'count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
          $access_key         = "AKIAIFMAPL6E7UCR2TTA"; //Access Key
          $secret_key         = "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"; //Secret Key
          $bucket             = "junecity.com"; //bucket name
          $region             = "us-east-1"; //bucket region
          $success_redirect   = "http://dream.app:1234/dashboard/media/store"; //URL to which the client is redirected upon success (currently self)
          $allowd_file_size   = "11048579"; //1 MB allowed Size
          $url_key            = Auth::user()->url_key;
          $path               = 'clients/services/'.$url_key.'/images';

          $S3upload = new S3upload($access_key, $secret_key, $bucket, $region, $success_redirect, $allowd_file_size, $url_key, $path);

           
          $upload = $S3upload->Upload();

        

          return view('junecity::media.create', compact('path','bucket','success_redirect','region', 'access_key', 'upload'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {   
        
        $my_bucket = "junecity.com"; //bucket name
        $key = $request->key;
        $user = Auth::user();
        $url_key = Auth::user()->url_key;
        $path = 'clients/services/'.$url_key.'/images';

        $job = (new ResizeImage($user, $path, $my_bucket, $key));

        $this->dispatch($job);
        
        Activity::log('Image uploaded and resized successfully', $user);


        return redirect()->route('media');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request)
    {
        return $request->key;
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
        $bucket = "junecity.com"; //bucket name
        $url_key = Auth::user()->url_key;

        $path = 'clients/services/'.$url_key.'/images';
        $original_url = $request->original_url;
        $id = $request->id;


        $job = (new UpdateResizeImage($id, $path, $bucket, $original_url));

        $this->dispatch($job);


        return redirect()->route('media');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $my_bucket = "junecity.com"; //bucket name
        $user = Auth::user();
        $url_key = Auth::user()->url_key;
        $path = 'clients/services/'.$url_key.'/images';

        $job = (new DeleteImage($id, $user, $path, $my_bucket));

        $this->dispatch($job);

        return redirect()->route('media');
    }
}
