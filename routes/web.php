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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth.session');

Route::controller(LoginController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::post('login', 'tryLogin')->name('sample.validate_login');

    Route::get('logout', 'logout')->name('logout')->middleware('authenticated');    

    Route::get('dashboard', 'dashboard')->name('dashboard')->middleware('authenticated');

});

// Route::group(['middleware' => 'authenticated'], function () {
    
// });
