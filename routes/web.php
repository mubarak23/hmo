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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/admin', [
        'uses' => 'SystemAdminController@index',
        'as' => 'admin.index'
    ]);
})->middleware('systemadmin');

Route::group(['prefix' => 'doctor'], function(){
    Route::get('/doctor', [
        'uses' => 'DoctorController@index',
        'as' => 'doctor.index'
    ]);
})->middleware('doctor');

Route::group(['prefix' => 'nurse'], function(){
    Route::get('/admin', [
        'uses' => 'NurseController@index',
        'as' => 'nurse.index'
    ]);
})->middleware('nurse');

Route::group(['prefix' => 'receptionist'], function(){
    Route::get('/admin', [
        'uses' => 'ReceptionistController@index',
        'as' => 'receptionist.index'
    ]);
})->middleware('receptionist');

Route::group(['prefix' => 'pharmacist'], function(){
    Route::get('/admin', [
        'uses' => 'PharmacistController@index',
        'as' => 'pharmacist.index'
    ]);
})->middleware('pharmacist');

Route::group(['prefix' => 'laboratory'], function(){
    Route::get('/admin', [
        'uses' => 'LaboratoryController@index',
        'as' => 'laboratory.index'
    ]);
})->middleware('laboratory');

Route::group(['prefix' => 'patient'], function(){
    Route::get('/admin', [
        'uses' => 'PatientController@index',
        'as' => 'patient.index'
    ]);
})->middleware('patient');




Route::get('/home', 'HomeController@index')->name('home');
