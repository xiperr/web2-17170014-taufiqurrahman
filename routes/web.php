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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sample', 'HomeController@SamplePage')->name('Contoh Halaman');

Route::get('/sample/view', 'HomeController@SampleViewBlade')->name('Contoh Halaman View');

Route::resource('reminders','ReminderControlller');

//Route::post('reminders/store', 'ReminderControlller@store');
//Route::put('reminders/update', 'ReminderControlller@update');
/**
 * Request?
 * Permintaan dari http dari client
 * Get permintaan tanpa ada data yang rahasia
 * permintaan Post menggunakan form
 * PUT
 * Delete
 */
