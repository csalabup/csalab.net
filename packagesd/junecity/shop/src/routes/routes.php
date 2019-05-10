<?php
use junecity\shop\Example;

use junecity\shop\controllers;



Route::get('/test', function () {
   
 



});


Route::get('/', function () {
   
 $ju = new example;

 return $ju->message();

});


Route::group(['prefix' => 'auth', 'middleware' => ['web']], function()
{
// Authentication routes...
Route::get('/login', 'junecity\shop\Controllers\Auth\AuthLoginController@getLogin');
Route::post('/login', ['as' => 'post-login', 'uses' =>  'junecity\shop\Controllers\Auth\AuthLoginController@postLogin']);
Route::get('/logout', 'junecity\shop\Controllers\Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', ['as' => 'get-register', 'uses' => 'junecity\shop\Controllers\Auth\AuthController@getRegister']);
Route::post('/register', ['as' => 'post-register', 'uses' => 'junecity\shop\Controllers\Auth\AuthController@postRegister']);

});


Route::group(['prefix' => 'dashboard', 'middleware' => ['web']], function()
{
    
//Dashboard routes....
Route::get('/', 'junecity\shop\Controllers\DashboardController@index');


// Categories routes...
Route::get('/categories/', ['as' => 'categories', 'uses' =>'junecity\shop\Controllers\CategoryController@index']);

Route::get('/categories/index', ['as' => 'categories', 'uses' =>'junecity\shop\Controllers\CategoryController@index']);

Route::get('/categories/create', ['as' => 'create-category', 'uses' =>'junecity\shop\Controllers\CategoryController@create']);

Route::get('/categories/edit/{id}', ['as' => 'edit-category', 'uses' =>'junecity\shop\Controllers\CategoryController@edit']);

Route::put('/categories/update/{id}', ['as' => 'update-category', 'uses' => 'junecity\shop\Controllers\CategoryController@update']);

Route::post('/categories/store', ['as' => 'store-category', 'uses' => 'junecity\shop\Controllers\CategoryController@store']);

// Items routes...
Route::get('/items/', ['as' => 'items', 'uses' =>'junecity\shop\Controllers\ItemController@index']);

Route::get('/items/index', ['as' => 'items', 'uses' =>'junecity\shop\Controllers\ItemController@index']);

Route::get('/items/create', ['as' => 'create-item', 'uses' =>'junecity\shop\Controllers\ItemController@create']);

Route::get('/items/edit/{id}', ['as' => 'edit-item', 'uses' =>'junecity\shop\Controllers\ItemController@edit']);

Route::put('/items/update/{id}', ['as' => 'update-item', 'uses' => 'junecity\shop\Controllers\ItemController@update']);

Route::post('/items/store', ['as' => 'store-item', 'uses' => 'junecity\shop\Controllers\ItemController@store']);

//Route::get('/items/image-update/{id}/{original_id}', ['as' => 'image-update', 'uses' =>'ItemController@imageupdate']);

Route::post('/items/image-update/{id}', ['as' => 'image-update', 'uses' =>'junecity\shop\Controllers\ImagerItemController@store']);

Route::get('/items/images/{id}', ['as' => 'images', 'uses' =>'junecity\shop\Controllers\ItemController@images']);

// Sizes routes...
Route::get('/sizes/', ['as' => 'sizes', 'uses' =>'junecity\shop\Controllers\SizeController@index']);

Route::get('/sizes/index', ['as' => 'sizes', 'uses' =>'junecity\shop\Controllers\SizeController@index']);

Route::get('/sizes/create', ['as' => 'create-size', 'uses' =>'junecity\shop\Controllers\SizeController@create']);

Route::get('/sizes/edit/{id}', ['as' => 'edit-size', 'uses' =>'junecity\shop\Controllers\SizeController@edit']);

Route::put('/sizes/update/{id}', ['as' => 'update-size', 'uses' => 'junecity\shop\Controllers\SizeController@update']);

Route::post('/sizes/store', ['as' => 'store-size', 'uses' => 'junecity\shop\Controllers\SizeController@store']);

// Colors routes...
Route::get('/colors/', ['as' => 'colors', 'uses' =>'junecity\shop\Controllers\ColorController@index']);

Route::get('/colors/index', ['as' => 'colors', 'uses' =>'junecity\shop\Controllers\ColorController@index']);

Route::get('/colors/create', ['as' => 'create-color', 'uses' =>'junecity\shop\Controllers\ColorController@create']);

Route::get('/colors/edit/{id}', ['as' => 'edit-color', 'uses' =>'junecity\shop\Controllers\ColorController@edit']);

Route::put('/colors/update/{id}', ['as' => 'update-color', 'uses' => 'junecity\shop\Controllers\ColorController@update']);

Route::post('/color/store', ['as' => 'store-color', 'uses' => 'junecity\shop\Controllers\ColorController@store']);

// Imager routes....
Route::post('/upload', 'junecity\shop\Controllers\ImagerCategoryController@store');


// Media routes...
Route::get('/media/', ['as' => 'media', 'uses' =>'junecity\shop\Controllers\MediaController@index']);

Route::get('/media/index', ['as' => 'media', 'uses' =>'junecity\shop\Controllers\MediaController@index']);

Route::get('/media/create', ['as' => 'create-media', 'uses' =>'junecity\shop\Controllers\MediaController@create']);

Route::get('/media/edit/{id}', ['as' => 'edit-media', 'uses' =>'junecity\shop\Controllers\MediaController@edit']);

Route::post('/media/update', ['as' => 'update-media', 'uses' => 'junecity\shop\Controllers\MediaController@update']);

Route::get('/media/store', ['as'=> 'store-media', 'uses' => 'junecity\shop\Controllers\MediaController@store']);

Route::get('/media/show', ['as' => 'show-media', 'uses' =>'junecity\shop\Controllers\MediaController@show']);

Route::get('/media/delete/{id}', ['as' => 'delete-media', 'uses' =>'junecity\shop\Controllers\MediaController@destroy']);


});



Route::group(['prefix' => 'api/v1'], function()
{

	Route::get('item', 'junecity\shop\Controllers\apiItemController@index');

	Route::get('item/{id}', 'junecity\shop\Controllers\apiItemController@show');

	Route::post('item', 'junecity\shop\Controllers\apiItemController@store');


});