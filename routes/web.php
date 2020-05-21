<?php

use App\Http\Controllers\TagController;
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
Route::view('tag_list', 'admin.tag.index')->name('tag.list');
Route::resource('tag', 'TagController');
// Route::get('tag_list', 'TagController@list');
Route::get('tag-trash', 'TagController@trash');
Route::delete('tag/{id}','TagController@delete');
Route::put('tag-restore/{id}','TagController@restore');

// category
Route::resource('category', 'CategoryController');
Route::view('category-list', 'admin.category.index')->name('category.list');
Route::get('category-trash', 'CategoryController@trash');
Route::get('category-restore/{id}', 'CategoryController@restore');  
Route::delete('category-delete/{id}', 'CategoryController@hardDelete');  

// customer
Route::resource('customer', 'CustomerController');
Route::view('customer-list', 'admin.customer.index')->name('customer.list');



Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::resource('branch', 'BranchController');
Route::view('branch_list', 'admin.branch.index')->name('branch.list');
Route::get('branch_trash', 'BranchController@trash');

Route::get('branch_trash/{id}', 'BranchController@findTrash');
Route::get('branch_restore/{id}', 'BranchController@restore');
Route::get('branch_delete/{id}', 'BranchController@delete');


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

Route::prefix('products')->group(function(){

    Route::get('/trash','ProductController@trash');

    Route::get('/json','ProductController@json');

    Route::get('/','ProductController@index');

    Route::get('/history','ProductController@history');

    Route::get('/{id}/restore','ProductController@restore');

    Route::post('/create','ProductController@store');

    Route::get('/{id}','ProductController@show');

    Route::put('/{id}','ProductController@update');

    Route::delete('/{id}/delete','ProductController@delete');

    Route::delete('/{id}','ProductController@destroy');
});

