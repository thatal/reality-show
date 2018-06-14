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

Route::get('/', ['uses' => 'WebsiteController@index'])->name('app.index');
Route::post('vote', ['uses' => 'WebsiteController@votePost']);
// Route::get('vote', function(){
//     return "Hited";
// });
// Route::get('quotes', function(){
//     Artisan::call('inspire');
//     return Artisan::output();
// })->name('quotes');
// Route::group(['middleware' => ['admission_md']], function () {
    Route::group(['prefix' => 'system'],
        function(){
            // auth routes are here.
            // Auth::routes();
            Route::get('/', ['uses' => 'AdminController@index'])->name('admin.dashboard');
            Route::get('login', function () {
                return view('login');
            })->name('login')->middleware('guest');
            Route::post('login', ['middleware'=> 'guest','uses' => 'AdminController@login'])->name('admin.login.post');
            Route::get('logout', ['uses' => 'Admincontroller@logout'])->name('admin.logout');
            Route::get('profile', function () {
                return view('admin.index');
            })->name('admin.profile');
            Route::get('change_passowrd', function () {
                return view('admin.index');
            })->name('admin.profile');
            Route::post('change_passowrd', function () {
                return view('admin.index');
            })->name('admin.profile');
            Route::get('change_password', function () {
                return view('admin.ace_change_password');
            })->name('admin.change_pass');
            Route::post('cahnge_password', ['uses' => 'AdminController@ChangePassword'])->name('admin.change_pass.post');

            Route::group(['prefix' => 'show'], function(){
                Route::get('/', ['uses' => 'AdminController@showCreate','as' =>'admin.show.create']);
                Route::post('create', ['uses' => 'AdminController@showSave','as' =>'admin.show.save']);
                Route::get('edit/{show_id}', ['uses' => 'AdminController@showEdit','as' =>'admin.show.edit']);
                Route::post('edit/{show_id}', ['uses' => 'AdminController@showUpdate','as' =>'admin.show.update']);
            });
            Route::group(['prefix' => 'rounds'], function(){
                Route::get('/', ['uses' => 'AdminController@roundsCreate','as' =>'admin.rounds.create']);
                Route::post('create', ['uses' => 'AdminController@roundsSave','as' =>'admin.rounds.save']);
                Route::get('edit/{round_id}', ['uses' => 'AdminController@roundsEdit','as' =>'admin.rounds.edit']);
                Route::post('edit/{round_id}', ['uses' => 'AdminController@roundsUpdate','as' =>'admin.rounds.update']);
                Route::get('activate/{round_id}', ['uses' => 'AdminController@roundsActivate','as' =>'admin.rounds.activate']);
            });
            Route::group(['prefix' => 'contestant'], function(){
                Route::get('/', ['uses' => 'AdminController@contestantCreate','as' =>'admin.contestant.create']);
                Route::post('create', ['uses' => 'AdminController@contestantSave','as' =>'admin.contestant.save']);
                Route::get('edit/{contestant_id}', ['uses' => 'AdminController@contestantEdit','as' =>'admin.contestant.edit']);
                Route::post('edit/{contestant_id}', ['uses' => 'AdminController@contestantUpdate','as' =>'admin.contestant.update']);
                Route::post('uploads/{contestant_id}', ['uses' => 'AdminController@contestantUploadsFile','as' =>'admin.contestant.uploads']);
            });
            Route::group(['prefix' => 'contestant_rounds'], function(){
                Route::get('/', ['uses' => 'AdminController@contestant_roundsCreate','as' =>'admin.contestant_rounds.create']);
                Route::post('create', ['uses' => 'AdminController@contestant_roundsSave','as' =>'admin.contestant_rounds.save']);
                Route::get('edit/{round_id}', ['uses' => 'AdminController@contestant_roundsEdit','as' =>'admin.contestant_rounds.edit']);
                Route::post('edit/{round_id}', ['uses' => 'AdminController@contestant_roundsUpdate','as' =>'admin.contestant_rounds.update']);
            });
            Route::group(['prefix' => 'reports'], function(){
                // Route::get('/', ['uses' => 'AdminController@contestant_roundsCreate','as' =>'admin.contestant_rounds.create']);
                // Route::post('create', ['uses' => 'AdminController@contestant_roundsSave','as' =>'admin.contestant_rounds.save']);
                // Route::get('edit/{round_id}', ['uses' => 'AdminController@contestant_roundsEdit','as' =>'admin.contestant_rounds.edit']);
                // Route::post('edit/{round_id}', ['uses' => 'AdminController@contestant_roundsUpdate','as' =>'admin.contestant_rounds.update']);
            });
        }
    );
// });
Route::post('/votes', ['uses' => 'WebsiteController@vote', 'as' =>'sendVote']);
Route::get('/verify_otp', ['uses' => 'WebsiteController@verifyOTP', 'as' =>'verifyOTP']);



// Route::get('/home', 'HomeController@index')->name('home');
