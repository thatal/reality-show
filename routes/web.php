<?php

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
    return view('admin.index');
})->name('app.index');
Route::group(['prefix' => 'system'],
    function(){
        Route::get('/', function () {
            return view('admin.index');
        })->name('admin.dashboard');
        Route::get('login', function () {
            return view('login');
        })->name('admin.login');
        Route::get('logout', function () {
            return view('admin.index');
        })->name('admin.logout');
        Route::get('profile', function () {
            return view('admin.index');
        })->name('admin.profile');
    }
);
