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
    return view('home');
});

Route::group(['prefix'=>'blogger'], function (){
   Route::get('/','BlogController@index')->name('blogger.index');
   Route::get('/create','BlogController@create')->name('blogger.create');
   Route::post('/create','BlogController@store')->name('blogger.store');
   Route::get('/{id}/edit','BlogController@edit')->name('blogger.edit');
   Route::post('{id}/edit','BlogController@update')->name('blogger.update');
   Route::get('/{id}/destroy','BlogController@destroy')->name('blogger.destroy');
});
