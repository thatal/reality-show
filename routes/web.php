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
            Route::get('logout', ['uses' => 'AdminController@logout'])->name('admin.logout');
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

            Route::group(['prefix' => 'ajax'], function(){
                Route::get('artist_data/{artist_id}', ['uses' => 'ReportsController@ajaxArtistVote','as' =>'artist_round_wise']);
            });

            Route::group(['prefix' => 'rounds'], function(){
                Route::get('/', ['uses' => 'MasterController@roundsCreate','as' =>'admin.rounds.index']);
                Route::post('create', ['uses' => 'MasterController@roundsSave','as' =>'admin.rounds.save']);
                // Route::get('edit/{round_id}', ['uses' => 'MasterController@roundsEdit','as' =>'admin.rounds.edit']);
                // Route::post('edit/{round_id}', ['uses' => 'MasterController@roundsUpdate','as' =>'admin.rounds.update']);
                Route::get('activate/{round_id}', ['uses' => 'MasterController@roundsActivate','as' =>'admin.rounds.activate']);
            });
            Route::group(['prefix' => 'contestant'], function(){
                Route::get('/', ['uses' => 'MasterController@contestantCreate','as' =>'admin.contestant.create']);
                Route::post('create', ['uses' => 'MasterController@contestantSave','as' =>'admin.contestant.save']);
                Route::get('edit/{contestant_id}', ['uses' => 'MasterController@contestantEdit','as' =>'admin.contestant.edit']);
                Route::post('edit/{contestant_id}', ['uses' => 'MasterController@contestantUpdate','as' =>'admin.contestant.update']);
                // Route::post('uploads/{contestant_id}', ['uses' => 'MasterController@contestantUploadsFile','as' =>'admin.contestant.uploads']);
            });
            Route::group(['prefix' => 'contestant_rounds'], function(){
                Route::get('/', ['uses' => 'MasterController@contestant_roundsCreate','as' =>'admin.contestant_rounds.create']);
                Route::post('create', ['uses' => 'MasterController@contestant_roundsSave','as' =>'admin.contestant_rounds.save']);
                // Route::get('edit/{round_id}', ['uses' => 'MasterController@contestant_roundsEdit','as' =>'admin.contestant_rounds.edit']);
                // Route::post('edit/{round_id}', ['uses' => 'MasterController@contestant_roundsUpdate','as' =>'admin.contestant_rounds.update']);
                Route::post('send_cont', ['uses' => 'MasterController@sendContestant','as' =>'admin.send_cont']);
                Route::get('change_image_tube/{round_id}', ['uses' => 'MasterController@changeImageTube','as' =>'admin.change.img.tube']);
                Route::post('change_image_tube/{round_id}', ['uses' => 'MasterController@changeImageTubePost','as' =>'admin.change.img.tube.post']);
                Route::get('change_status/{round_id}',['uses' => 'MasterController@chnageStatus', 'as' => 'round.change.status']);
            });
            Route::group(['prefix' => 'reports'], function(){
                Route::get('overall', ['uses' => 'ReportsController@overallVoting','as' =>'overall.votiing']);
                Route::get('voters', ['uses' => 'ReportsController@votersReport','as' =>'voters.report']);
            });
        }
    );
// });
Route::post('/votes', ['uses' => 'WebsiteController@vote', 'as' =>'sendVote']);
Route::get('/verify_otp', ['uses' => 'WebsiteController@verifyOTP', 'as' =>'verifyOTP']);



// Route::get('/home', 'HomeController@index')->name('home');
