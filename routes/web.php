<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/listing/{id}', 'singleListing')->name('listing');
    Route::get('/create', 'create')->name('create')->middleware('auth');
    Route::post('/store', 'store')->name('store')->middleware('auth');
    Route::get('/dit/{id}', 'edit')->name('edit')->middleware('auth');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('delete');

});


    Route::controller(AuthController::class)->group(function(){
        Route::get('/create/user', 'index')->name('create_user');
        Route::post('/register', 'store')->name('register')->middleware('guest');
        Route::get('/login', 'login')->name('login')->middleware('guest');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::post('/logout', 'destroy')->name('logout');
    });


