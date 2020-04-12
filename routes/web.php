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
})->name('systemadmin')->middleware('systemadmin');

Route::group(['prefix' => 'doctor'], function(){
    Route::get('/doctor', [
        'uses' => 'DoctorController@index',
        'as' => 'doctor.index'
    ]);
})->name('doctor')->middleware('doctor');

Route::group(['prefix' => 'nurse'], function(){
    Route::get('/nurse', [
        'uses' => 'NurseController@index',
        'as' => 'nurse.index'
    ]);
})->name('nurse')->middleware('nurse');

Route::group(['prefix' => 'receptionist'], function(){
    Route::get('/receptionist', [
        'uses' => 'ReceptionistController@index',
        'as' => 'receptionist.index'
    ]);
})->name('receptionist')->middleware('receptionist');

Route::group(['prefix' => 'pharmacist'], function(){
    Route::get('/pharmacist', [
        'uses' => 'PharmacistController@index',
        'as' => 'pharmacist.index'
    ]);
})->name('pharmacist')->middleware('pharmacist');

Route::group(['prefix' => 'laboratory'], function(){
    Route::get('/laboratory', [
        'uses' => 'LaboratoryController@index',
        'as' => 'laboratory.index'
    ]);
})->name('laboratory')->middleware('laboratory');

Route::group(['prefix' => 'patient'], function(){
    Route::get('/patient', [
        'uses' => 'PatientController@index',
        'as' => 'patient.index'
    ]);
})->name('patient')->middleware('patient');




Route::get('/home', 'HomeController@index')->name('home');
