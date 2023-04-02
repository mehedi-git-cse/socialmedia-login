<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;


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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/component', function () {
    return view('mastering.component');
});

// Route::get('/update', [App\Http\Controllers\HomeController::class, 'upload']);
Route::get('/update', [App\Http\Controllers\HomeController::class, 'editprofile']);
Route::post('/upload', [App\Http\Controllers\HomeController::class, 'upload']);
Route::get('auth/google',[GoogleController::class,'loginWithGoogle'])->name('glogin');
Route::get('auth/google/callback',[GoogleController::class,'callbackfromGoogle'])->name('callback');


Route::get('auth/facebook',[GoogleController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback',[GoogleController::class, 'handleFacebookCallback']);
