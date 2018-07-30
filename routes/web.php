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
    return view('welcome');
});


//endregion

Route::group(["prefix"=>"panel"],function (){
    Route::get("/panel","PanelController@index")->name("panel.index");

    Route::resource("panel","PanelController");
    Route::resource("category","CategoryController");
    Route::resource("product","ProductController");

});