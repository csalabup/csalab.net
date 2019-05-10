<?php




Route::group(['prefix' => 'shop'], function () {

Route::get('/{shop_name}', ['as' => 'shop', 'uses' =>'junecity\shop\controllers\shops\ShopController@index']);
   





});


Route::group(['prefix' => 'auth', 'middleware' => ['web']], function()
{
// Authentication routes...

Route::get('/', 'junecity\shop\controllers\Auth\AuthLoginController@getLogin');
Route::get('/login', 'junecity\shop\controllers\Auth\AuthLoginController@getLogin');
Route::post('/login', ['as' => 'post-login', 'uses' =>  'junecity\shop\controllers\Auth\AuthLoginController@postLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'junecity\shop\controllers\Auth\AuthLogoutController@getLogout']);

// Registration routes...
Route::get('/register', ['as' => 'get-register', 'uses' => 'junecity\shop\controllers\Auth\AuthRegisterController@getRegister']);
Route::post('/register', ['as' => 'post-register', 'uses' => 'junecity\shop\controllers\Auth\AuthRegisterController@postRegister']);

});


Route::group(['prefix' => 'dashboard', 'middleware' => ['web']], function()
{
    
// Dashboard routes....
Route::get('/', 'junecity\shop\controllers\DashboardController@index');



// Dashboard routes...
Route::get('/', ['as' => 'dashboard', 'uses' =>'junecity\shop\controllers\UserController@index']);

// Dashboard routes...
Route::get('/', ['as' => 'dashboard', 'uses' =>'junecity\shop\controllers\DashboardController@index']);


// Categories routes...
Route::get('/categories/', ['as' => 'categories', 'uses' =>'junecity\shop\controllers\CategoryController@index']);

Route::get('/categories/index', ['as' => 'categories', 'uses' =>'junecity\shop\controllers\CategoryController@index']);

Route::get('/categories/create', ['as' => 'create-category', 'uses' =>'junecity\shop\controllers\CategoryController@create']);

Route::get('/categories/edit/{id}', ['as' => 'edit-category', 'uses' =>'junecity\shop\controllers\CategoryController@edit']);

Route::put('/categories/update/{id}', ['as' => 'update-category', 'uses' => 'junecity\shop\controllers\CategoryController@update']);

Route::post('/categories/store', ['as' => 'store-category', 'uses' => 'junecity\shop\controllers\CategoryController@store']);

// Items routes...
Route::get('/items/', ['as' => 'items', 'uses' =>'junecity\shop\controllers\ItemController@index']);

Route::get('/items/index', ['as' => 'items', 'uses' =>'junecity\shop\controllers\ItemController@index']);

Route::get('/items/create', ['as' => 'create-item', 'uses' =>'junecity\shop\controllers\ItemController@create']);

Route::get('/items/edit/{id}', ['as' => 'edit-item', 'uses' =>'junecity\shop\controllers\ItemController@edit']);

Route::put('/items/update/{id}', ['as' => 'update-item', 'uses' => 'junecity\shop\controllers\ItemController@update']);

Route::post('/items/store', ['as' => 'store-item', 'uses' => 'junecity\shop\controllers\ItemController@store']);

//Route::get('/items/image-update/{id}/{original_id}', ['as' => 'image-update', 'uses' =>'ItemController@imageupdate']);

Route::post('/items/image-update/{id}', ['as' => 'image-update', 'uses' =>'junecity\shop\controllers\ImagerItemController@store']);

Route::get('/items/images/{id}', ['as' => 'images', 'uses' =>'junecity\shop\controllers\ItemController@images']);

// Sizes routes...
Route::get('/sizes/', ['as' => 'sizes', 'uses' =>'junecity\shop\controllers\SizeController@index']);

Route::get('/sizes/index', ['as' => 'sizes', 'uses' =>'junecity\shop\controllers\SizeController@index']);

Route::get('/sizes/create', ['as' => 'create-size', 'uses' =>'junecity\shop\controllers\SizeController@create']);

Route::get('/sizes/edit/{id}', ['as' => 'edit-size', 'uses' =>'junecity\shop\controllers\SizeController@edit']);

Route::put('/sizes/update/{id}', ['as' => 'update-size', 'uses' => 'junecity\shop\controllers\SizeController@update']);

Route::post('/sizes/store', ['as' => 'store-size', 'uses' => 'junecity\shop\controllers\SizeController@store']);

// Colors routes...
Route::get('/colors/', ['as' => 'colors', 'uses' =>'junecity\shop\controllers\ColorController@index']);

Route::get('/colors/index', ['as' => 'colors', 'uses' =>'junecity\shop\controllers\ColorController@index']);

Route::get('/colors/create', ['as' => 'create-color', 'uses' =>'junecity\shop\controllers\ColorController@create']);

Route::get('/colors/edit/{id}', ['as' => 'edit-color', 'uses' =>'junecity\shop\controllers\ColorController@edit']);

Route::put('/colors/update/{id}', ['as' => 'update-color', 'uses' => 'junecity\shop\controllers\ColorController@update']);

Route::post('/color/store', ['as' => 'store-color', 'uses' => 'junecity\shop\controllers\ColorController@store']);

// Imager routes....
//Route::post('/upload', 'junecity\shop\controllers\ImagerCategoryController@store');


// Media routes...
Route::get('/media/', ['as' => 'media', 'uses' =>'junecity\shop\controllers\MediaController@index']);

Route::get('/media/index', ['as' => 'media', 'uses' =>'junecity\shop\controllers\MediaController@index']);

Route::get('/media/create', ['as' => 'create-media', 'uses' =>'junecity\shop\controllers\MediaController@create']);

Route::get('/media/edit/{id}', ['as' => 'edit-media', 'uses' =>'junecity\shop\controllers\MediaController@edit']);

Route::post('/media/update', ['as' => 'update-media', 'uses' => 'junecity\shop\controllers\MediaController@update']);

Route::post('/media/store', ['as'=> 'store-media', 'uses' => 'junecity\shop\controllers\MediaController@store']);

Route::get('/media/show', ['as' => 'show-media', 'uses' =>'junecity\shop\controllers\MediaController@show']);

Route::post('/media/delete/{id}', ['as' => 'delete-media', 'uses' =>'junecity\shop\controllers\MediaController@destroy']);


//Settings route
Route::get('/settings/index', ['as' => 'settings', 'uses' =>'junecity\shop\controllers\SettingsController@index']);

Route::put('/settings/update/{id}', ['as' => 'update-settings', 'uses' => 'junecity\shop\controllers\SettingsController@update']);


// Role routes...
Route::get('/roles/', ['as' => 'roles', 'uses' =>'junecity\shop\controllers\RoleController@index']);

Route::get('/roles/index', ['as' => 'roles', 'uses' =>'junecity\shop\controllers\RoleController@index']);

Route::get('/roles/create', ['as' => 'create-role', 'uses' =>'junecity\shop\controllers\RoleController@create']);

Route::get('/roles/edit/{id}', ['as' => 'edit-role', 'uses' =>'junecity\shop\controllers\RoleController@edit']);

Route::put('/roles/update/{id}', ['as' => 'update-role', 'uses' => 'junecity\shop\controllers\RoleController@update']);

Route::post('/roles/store', ['as' => 'store-role', 'uses' => 'junecity\shop\controllers\RoleController@store']);

// Users routes...
Route::get('/users/', ['as' => 'users', 'uses' =>'junecity\shop\controllers\UserController@index']);

Route::get('/users/index', ['as' => 'users', 'uses' =>'junecity\shop\controllers\UserController@index']);

Route::get('/users/create', ['as' => 'create-user', 'uses' =>'junecity\shop\controllers\UserController@create']);

Route::get('/users/edit/{id}', ['as' => 'edit-user', 'uses' =>'junecity\shop\controllers\UserController@edit']);

Route::put('/users/update/{id}', ['as' => 'update-user', 'uses' => 'junecity\shop\controllers\UserController@update']);

Route::post('/users/store', ['as' => 'store-user', 'uses' => 'junecity\shop\controllers\UserController@store']);


// Domain routes...
Route::get('/domain/', ['as' => 'domain', 'uses' =>'junecity\shop\controllers\DomainController@index']);






});



Route::group(['prefix' => 'api/v1'], function()
{

	Route::get('item', 'junecity\shop\controllers\apiItemController@index');

	Route::get('item/{id}', 'junecity\shop\controllers\apiItemController@show');

	Route::post('item', 'junecity\shop\controllers\apiItemController@store');


});