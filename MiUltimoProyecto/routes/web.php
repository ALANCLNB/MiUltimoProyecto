<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('ver/{id}','ProfileController@index');
/////////////////////////////////
Route::get('profile', function () {
    return view('profile');
});
Route::get('profile/editar', function () {
    return "Estas editando";
});
/*
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/usuarios', 'UsersController@index');
    //Route::post('/usuarios', 'UsersController@store');
    //Con esto ya mandamos el store, edit y destroy
    Route::resource('/usuarios', 'UsersController');
});*/

Route::group(['prefix'=>'admin','as'=>'admin'],function(){
    Route::get('/', 'AdminController@index');

    Route::get('/usuarios', 'UsersController@index');
    Route::resource('usuarios','UsersController');

    Route::get('/inventario', 'VinoController@index');
    Route::resource('vinos','VinoController');
});



