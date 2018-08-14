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

Auth::routes();

Route::get('/', function() {
    return redirect()->route('login');
});

Route::get('dashboard', 'HomeController@index')->name('dashboard');

Route::get('admin', 'AdminController@index')->name('admin.index');

Route::get('admin/{id}', 'AdminController@show')->name('admin.edit');

Route::resource('student', 'StudentController');

Route::resource('event', 'EventController');

Route::resource('records', 'RecordController');

Route::resource('schedules', 'ScheduleController');

Route::resource('fines', 'FinesController');

Route::resource('history', 'HistoryController');

Route::get('/attend', 'AttendanceController@sign')->middleware('web');

Route::get('schedules/{id}/create', 'ScheduleController@create');

Route::get('student/report/{id}', 'StudentController@report')->name('student.report');

Route::get('student/record/{id}', 'RecordController@show');

Route::get('event/{id}/schedule', 'ScheduleController@show');

Route::get('student/uniform/{id}', 'StudentController@addUniformFine')->name('student.addUniformFine');

//Student Routes

Route::get('guest/home', 'StudentController@home')->name('student.home');

Route::get('guest', 'Student\LoginController@showLoginForm')->name('student.auth.login');

Route::post('guest', 'Student\LoginController@login');

Route::post('guest-password/email', 'Student\ForgotPasswordController@sendResetLinkEmail')->name('student.auth.password.email');

Route::get('guest-password/reset', 'Student\ForgotPasswordController@showLinkRequestForm')->name('student.auth.password.request');

Route::post('guest-password/reset', 'Student\ForgotPasswordController@reset');

Route::get('guest-password/reset/{token}', 'Student\ResetPasswordController@showResetForm')->name('student.auth.pasword.reset');

Route::get('stud/master', 'StudentController@getMasterList')->name('student.master');

Route::get('stud/{id}/activate', 'StudentController@activate')->name('student.activate');

//Contribution Routes

Route::get('contribution', 'ContributionController@index')->name('cont.index');

Route::post('contribution', 'ContributionController@store')->name('cont.store');

Route::get('contribution/create', 'ContributionController@create')->name('cont.create');

Route::get('contribution/{id}/edit', 'ContributionController@edit')->name('cont.edit');

Route::delete('contribution/{id}', 'ContributionController@destroy')->name('cont.delete');

//Uniform Routes

Route::get('uniform', 'RecordController@uniformIndex')->name('uniform.index');

Route::get('payment', 'PaymentController@index')->name('payment.index');

Route::get('payment/{id}', 'PaymentController@create')->name('payment.create');

Route::post('payment', 'PaymentController@store')->name('payment.store');

