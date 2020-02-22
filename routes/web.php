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
Route::post('UpdateMainProfile', 'PersonalInformationController@UpdateMainProfile');
Route::post('UpdatePhoto', 'PersonalInformationController@UpdatePhoto');
Route::get('index', 'PersonalInformationController@index');
Route::get('civil_status', 'PersonalInformationController@civil_status');
Route::get('gender', 'PersonalInformationController@gender');
Route::get('regions', 'PersonalInformationController@regions');
Route::get('provinces', 'PersonalInformationController@provinces');
Route::get('citymun', 'PersonalInformationController@citymun');
Route::get('barangays', 'PersonalInformationController@barangays');
Route::get('loadProvicesByRegion/{id}', 'PersonalInformationController@loadProvicesByRegion');
Route::get('loadCitymunByProvince/{id}', 'PersonalInformationController@loadCitymunByProvince');
Route::get('mypayroll','PayrollController@index');
//for view router
Route::get('{path}', 'HomeController@index')->where('path','([A-z\d-\/_.]+)?');

/*Route::prefix('/myinfo')->group(function () {
    Route::get('/', 'PersonalInformationController@index');
    Route::post('updatemainprofile/{employee_id}', 'PersonalInformationController@UpdateMainProfile');
});*/

