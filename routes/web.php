<?php

use Illuminate\Support\Facades\Route;

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


Route::prefix('brands')->group(function(){
    Route::get('/trash','BrandController@trash');

    Route::get('/json','BrandController@json');

    Route::get('/','BrandController@index')->name('brands.index');

    Route::get('/history','BrandController@history');

    Route::get('/{id}/restore','BrandController@restore');

    Route::post('/create','BrandController@store');

    Route::get('/{id}','BrandController@show');

    Route::put('/{id}','BrandController@update');

    Route::delete('/{id}/delete','BrandController@delete');

    Route::delete('/{id}','BrandController@destroy');
});
