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
    return view('admin.tag.index');
});
// Route::view('tag_list', 'admin.tag.index')->name('tag.list');
Route::resource('tag', 'TagController');
// Route::get('tag_list', 'TagController@list');
Route::get('tag-trash', 'TagController@trash');
Route::delete('tag/{id}','TagController@delete');
Route::put('tag-restore/{id}','TagController@restore');



Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::resource('branch', 'BranchController');
Route::view('branch_list', 'admin.branch.index')->name('branch.list');
Route::get('branch_trash', 'BranchController@trash');
