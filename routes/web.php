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

    Route::get('sub-category-add/{categoryId?}', [SubCategoryController::class, 'addForm'])->name('sub.category.add');
    Route::post('sub-category-store/{subCategoryId?}', [SubCategoryController::class, 'store'])->name('sub.category.submit');
    Route::get('sub-category-list/{categoryId?}', [SubCategoryController::class, 'list'])->name('sub.category.list');
    Route::get('sub-category-change-status/{subCategoryId}', [SubCategoryController::class, 'changeStatus'])->name('sub.category.change.status');
    Route::get('sub-category-edit/{subCategoryId}', [SubCategoryController::class, 'edit'])->name('sub.category.edit');
    Route::get('sub-category-delete/{subCategoryId}', [SubCategoryController::class, 'delete'])->name('sub.category.delete');
});
