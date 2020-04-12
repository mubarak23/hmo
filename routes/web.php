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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['systemadmin']], function(){
    Route::get('/systemadmin', [
        'uses' => 'SystemAdminController@index',
        'as' => 'admin.index'
    ]);
});

Route::group(['prefix' => 'doctor', 'middleware' => ['doctor'] ], function(){
    Route::get('/doctor', [
        'uses' => 'DoctorController@index',
        'as' => 'doctor.index'
    ]);
});

Route::group(['prefix' => 'nurse', 'middleware' => ['nurse']], function(){
    Route::get('/nurse', [
        'uses' => 'NurseController@index',
        'as' => 'nurse.index'
    ]);
});

Route::group(['prefix' => 'receptionist', 'middleware' => ['receptionist']], function(){
    Route::get('/receptionist', [
        'uses' => 'ReceptionistController@index',
        'as' => 'receptionist.index'
    ]);
});

Route::group(['prefix' => 'pharmacist', 'middleware' => 'pharmacist'], function(){
    Route::get('/pharmacist', [
        'uses' => 'PharmacistController@index',
        'as' => 'pharmacist.index'
    ]);
});

Route::group(['prefix' => 'laboratory', 'middleware' => ['laboratory']], function(){
    Route::get('/laboratory', [
        'uses' => 'LaboratoryController@index',
        'as' => 'laboratory.index'
    ]);
});

Route::group(['prefix' => 'patient', 'middleware' => ['patient']], function(){
    Route::get('/patient', [
        'uses' => 'PatientController@index',
        'as' => 'patient.index'
    ]);
});

Route::get('/signin', 'SignupController@index');
Route::get('/signup', 'SigninController@index');




Route::get('/home', 'HomeController@index')->name('home');
