<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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
//bill
Route::resource('bill', 'BillController');
Route::view('bill-list', 'admin.bill.index')->name('bill.list');
Route::get('bill-trash', 'BillController@trash');
Route::put('bill-restore/{id}', 'BillController@restore');
Route::put('bill-complete/{id}', 'BillController@updateComplete');
Route::delete('bill-delete/{id}', 'BillController@delete');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

// branch
Route::get('branch/index','BranchController@index');
Route::group(['middleware' => 'auth', 'prefix'=>'/branch'], function () {
    Route::get('/','BranchController@list')->name('branch.list');


    Route::group(['middleware' => 'can:boss'], function () {
        Route::post('/','BranchController@store');
        Route::get('/{id}/edit', 'BranchController@edit');
        Route::put('/{id}', 'BranchController@update');
        Route::delete('/{id}', 'BranchController@destroy');
        Route::get('/trash', 'BranchController@trash');
        Route::get('/trash/{id}', 'BranchController@findTrash');
        Route::get('/restore/{id}', 'BranchController@restore');
        Route::get('/delete/{id}', 'BranchController@delete');
    });

});

// staff
Route::group(['middleware' => 'auth', 'prefix'=>'/staff'], function () {
    Route::get('/','StaffController@list')->name('staff.list');
    Route::get('/index','StaffController@index');
    Route::get('/{id}/edit', 'StaffController@edit');
    Route::put('/{id}', 'StaffController@update');

    Route::group(['middleware' => 'can:admin'], function () {
        Route::post('/','StaffController@store');
        Route::delete('/{id}', 'StaffController@destroy');
        Route::get('/trash', 'StaffController@trash');
        Route::get('/trash/{id}', 'StaffController@findTrash');
        Route::get('/restore/{id}', 'StaffController@restore');
        Route::get('/delete/{id}', 'StaffController@delete');
    });
});

//user

Route::group(['middleware' => 'auth', 'prefix'=>'/user'], function () {
    Route::get('/','UserController@list')->name('user.list');
    Route::get('/index','UserController@index')->name('user.index');
    Route::get('/{id}/edit','UserController@edit')->name('user.edit');
    Route::put('/{id}','UserController@update')->name('user.update');

    Route::group(['middleware' => 'can:boss'], function () {
        Route::post('/','UserController@store')->name('user.store');
        Route::delete('/{id}','UserController@destroy')->name('user.destroy');
    });
});

// position
Route::group(['middleware' => 'auth', 'prefix'=>'/position'], function () {
    Route::get('/','PositionController@list')->name('position.list');
    Route::get('/index','PositionController@index');

    Route::group(['middleware' => 'can:boss'], function () {
        Route::post('/','PositionController@store');
        Route::get('/{id}/edit', 'PositionController@edit');
        Route::put('/{id}', 'PositionController@update');
        Route::delete('/{id}', 'PositionController@destroy');
        Route::get('/trash', 'PositionController@trash');
        Route::get('/trash/{id}', 'PositionController@findTrash');
        Route::get('/restore/{id}', 'PositionController@restore');
        Route::get('/delete/{id}', 'PositionController@delete');
    });
});


Route::get('/brands/json','BrandController@json');

Route::group(['middleware' => 'auth', 'prefix'=>'/brands'], function (){
    Route::get('/trash','BrandController@trash');

    Route::get('/','BrandController@index')->name('brands.index');

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


    Route::get('/{id}/restore','ProductController@restore');

    Route::post('/create','ProductController@store');

    Route::post('/upload','FileController@storeFile')->name('upload.file');

    Route::get('/trash/{id}','ProductController@findByIdTrash');

    Route::get('/{id}','ProductController@show');

    Route::put('/{id}','ProductController@update'); 
    
    Route::delete('/drop/{id}','FileController@drop');

    Route::delete('/remove/{id}','FileController@destroy');

    Route::delete('/{id}/delete','ProductController@delete');

    Route::delete('/{id}','ProductController@destroy');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//shop
Route::get('/', 'ShopController@getAll')->name('welcome');
Route::get('/ajax/getAll', 'ShopController@ajaxGetAll')->name('welcome.ajaxGetAll');

Route::get('/product-detail/{id}','ShopController@detail')->name('see-more');

Route::get('/filter-product','ShopController@filter');
Route::post('/search','ShopController@search')->name('search');

Route::get('/filer-category/{id}','ShopController@filterCategory');
Route::get('/filer-brand/{id}','ShopController@filterBrand');
Route::get('/filer-branch/{id}','ShopController@filterBranch');
