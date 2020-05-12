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
    return view('admin.category.index'); 
});
Route::get('category-trash', 'CategoryController@trash');
Route::resource('category', 'CategoryController');
Route::get('category-restore/{id}', 'CategoryController@restore');  
Route::get('category-hard-delete/{id}', 'CategoryController@hardDelete');  

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::resource('branch', 'BranchController');
Route::view('branch_list', 'admin.branch.index')->name('branch.list');
Route::get('branch_trash', 'BranchController@trash');

