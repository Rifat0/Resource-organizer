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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth.session');

Route::controller(LoginController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::post('login', 'tryLogin')->name('sample.validate_login');

});

Route::group(['middleware' => 'authenticated'], function () {

    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('category-add', [CategoryController::class, 'addForm'])->name('category.add');
    Route::post('category-store/{categoryId?}', [CategoryController::class, 'store'])->name('category.submit');
    Route::get('category-list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('category-edit/{categoryId}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('category-change-status/{categoryId}', [CategoryController::class, 'changeStatus'])->name('category.change.status');
    Route::get('category-delete/{categoryId}', [CategoryController::class, 'delete'])->name('category.delete');
});
