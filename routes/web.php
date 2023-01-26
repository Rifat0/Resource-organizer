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
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth.session');

Route::controller(LoginController::class)->group(function(){

    Route::get('login', 'index')->name('login');
    Route::post('login', 'tryLogin')->name('sample.validate_login');

});

Route::group(['middleware' => 'authenticated'], function () {

    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::controller(CategoryController::class)->group(function(){
        Route::get('category-add', 'addForm')->name('category.add');
        Route::post('category-list', 'store')->name('category.submit');
        Route::get('category-list', 'list')->name('category.list');
        Route::get('category-edit/{categoryId}', 'edit')->name('category.edit');
        Route::get('category-change-status/{categoryId}', 'changeStatus')->name('category.change.status');
        Route::get('category-delete/{categoryId}', 'delete')->name('category.delete');
    });

    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('sub-category-add/{categoryId?}', 'addForm')->name('sub.category.add');
        Route::post('sub-category-store/{subCategoryId?}', 'store')->name('sub.category.submit');
        Route::get('sub-category-list/{categoryId?}', 'list')->name('sub.category.list');
        Route::get('sub-category-edit/{subCategoryId}', 'edit')->name('sub.category.edit');
        Route::get('sub-category-change-status/{subCategoryId}', 'changeStatus')->name('sub.category.change.status');
        Route::get('sub-category-delete/{subCategoryId}', 'delete')->name('sub.category.delete');
    });

    Route::controller(ItemController::class)->group(function(){
        Route::get('item-add', 'addForm')->name('item.add');
        Route::post('item-store', 'store')->name('item.submit');
        Route::get('item-list', 'list')->name('item.list');
        Route::get('get-sub-category/{categoryId?}', 'getSubCategory')->name('get.sub.category');
        // Route::get('sub-category-edit/{subCategoryId}', 'edit')->name('sub.category.edit');
        // Route::get('sub-category-change-status/{subCategoryId}', 'changeStatus')->name('sub.category.change.status');
        // Route::get('sub-category-delete/{subCategoryId}', 'delete')->name('sub.category.delete');
    });
});
