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
    Route::get('', [
        'uses' => 'SystemAdminController@index',
        'as' => 'admin.index'
    ]);
  Route::post('/assign_role', [
      'uses' => 'SystemAdminController@assing_user_role',
      'as' => 'admin.assign_role'
  ]);
});

Route::group(['prefix' => 'doctor', 'middleware' => ['doctor'] ], function(){
    Route::get('/', [
        'uses' => 'DoctorController@index',
        'as' => 'doctor.index'
    ]);
    Route::post('/', [
        'uses' => 'DoctorController@updateprofile',
        'as' => 'doctor.update'
    ]);

    Route::get('/disease', [
        'uses' => 'DoctorController@viewalldisease',
        'as' => 'doctor.disease'
    ]);

    Route::post('/request_test', [

        'uses' => 'DoctorController@RequestTest',
        'as' => 'doctor.request_test'
    ]);

    Route::get('/patient_activity/{patient_id}', [
        'uses' => 'DoctorController@patient_activity',
        'as' => 'doctor.patient_activity'
    ]);

    Route::post('/consultation', [
        'uses' => 'DoctorController@add_consutation',
        'as'  => 'doctor.add_consultation'
    ]);

    Route::post('/priscription', [
        'uses' => 'DoctorController@add_priscription',
        'as'  => 'doctor.add_priscription'
    ]);

    Route::get('/priscription/{doctor_id}', [
        'uses' => 'DoctorController@doctor_priscription',
        'as' => 'doctor.priscription'
    ]);



    

});

Route::group(['prefix' => 'nurse', 'middleware' => ['nurse']], function(){
    Route::get('/', [
        'uses' => 'NurseController@index',
        'as' => 'nurse.index'
    ]);

    Route::get('/create', [
        'uses' => 'NurseController@create',
        'as' => 'nurse.create'
    ]);
    
    Route::post('/store', [
        'uses' => 'NurseController@store',
        'as' => 'nurse.store'
    ]);
    Route::post('/update_profile', [
        'uses' => 'NurseController@update_profile',
        'as' => 'nurse.update'
    ]);

    Route::get('/patient_data', [
        'uses' => 'NurseController@patients_data',
        'as' => 'nurse.patient_data'
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
    Route::get('/', [
        'uses' => 'PatientController@index',
        'as' => 'patient.index'
    ]);
    Route::get('/patient', [
        'uses' => 'PatientController@create',
        'as' => 'patient.create'
    ]);
});

Route::group(['prefix' => 'appointment'], function(){
    Route::get('/', [
        'uses' => 'AppointmentController@index',
        'as' => 'appointment.index'
    ]);

    Route::post('/', [
        'uses' => 'AppointmentController@create',
        'as'   => 'appointment.post'
    ]);
    
});


Route::get('/signin', [
   'uses' => 'SigninController@index',
   'as' => 'auth.signin'
]);


 Route::get('/signup', [
    'uses' => 'SignupController@index',
    'as' => 'auth.signup'
 ]);

 Route::post('/auth-signup', [
    'uses' => 'SignupController@create_account',
    'as' => 'auth.signup'
 ]);

//Route::get('/signup', 'SignupController@index');




Route::get('/home', 'HomeController@index')->name('home');
