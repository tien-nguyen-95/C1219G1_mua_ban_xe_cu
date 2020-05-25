<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();


//tag
Route::view('tag-list', 'admin.tag.index')->name('tag.list');
Route::resource('tag', 'TagController');
Route::get('tag-trash', 'TagController@trash');
Route::delete('tag-delete/{id}','TagController@delete');
Route::get('tag-restore/{id}','TagController@restore');

//guarantee
Route::view('guarantee-list', 'admin.guarantee.index')->name('guarantee.list');
Route::resource('guarantee', 'GuaranteeController');
Route::get('guarantee-trash', 'GuaranteeController@trash');
Route::delete('guarantee-delete/{id}','GuaranteeController@delete');
Route::get('guarantee-restore/{id}','GuaranteeController@restore');

// category
Route::resource('category', 'CategoryController');
Route::view('category-list', 'admin.category.index')->name('category.list');
Route::get('category-trash', 'CategoryController@trash');
Route::get('category-restore/{id}', 'CategoryController@restore');
Route::delete('category-delete/{id}', 'CategoryController@hardDelete');

// customer
Route::resource('customer', 'CustomerController');
Route::view('customer-list', 'admin.customer.index')->name('customer.list');
Route::get('customer-trash', 'CustomerController@trash');
Route::put('customer-restore/{id}', 'CustomerController@restore');
Route::delete('customer-delete/{id}', 'CustomerController@delete');

// branch
Route::resource('branch', 'BranchController');
Route::view('branch_list', 'admin.branch.index')->name('branch.list');
Route::get('branch_trash', 'BranchController@trash');

Route::get('branch_trash/{id}', 'BranchController@findTrash');
Route::get('branch_restore/{id}', 'BranchController@restore');
Route::get('branch_delete/{id}', 'BranchController@delete');

//use

Route::resource('user', 'UserController');
Route::view('user_list', 'admin.user.index')->name('user.list');


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

//position

Route::resource('position', 'PositionController');
Route::view('position_list', 'admin.position.index')->name('position.list');
Route::get('position_trash', 'PositionController@trash');

Route::get('position_trash/{id}', 'PositionController@findTrash');
Route::get('position_restore/{id}', 'PositionController@restore');
Route::get('position_delete/{id}', 'PositionController@delete');

// staff

Route::resource('staff', 'StaffController');
Route::view('staff_list', 'admin.staff.index')->name('staff.list');
Route::get('staff_trash', 'StaffController@trash');

Route::get('staff_trash/{id}', 'StaffController@findTrash');
Route::get('staff_restore/{id}', 'StaffController@restore');
Route::get('staff_delete/{id}', 'StaffController@delete');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/welcome', 'welcome');

