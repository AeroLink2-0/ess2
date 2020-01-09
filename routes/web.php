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
    return view('auth/login');
});

Route::get('/welcome', function(){
return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//modules
Route::prefix('/myinfo')->group(function () {
    Route::get('/', 'PersonalInformationController@index');
    Route::post('updatemainprofile/{employee_id}', 'PersonalInformationController@UpdateMainProfile');
});
