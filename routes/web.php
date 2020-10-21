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


// Authentication Routes...

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/account', 'AccountController');

//Route::resource('donation', 'DonationController');

// ACTIVATE ACCOUNT
Route::put('/account/{username}/activation', 'AccountController@activation')->name('account.activation');

// CHANGE PASSWORD
Route::get('/account/{username}/change-password', 'AccountController@changePassword')->name('password.edit');
Route::put('/account/{username}/update-password', 'AccountController@updatePassword')->name('password.update');

// CHANGE EMAIL
Route::get('/account/{username}/change-email', 'AccountController@changeEmail')->name('email.edit');
Route::put('/account/{username}/update-email', 'AccountController@updateEmail')->name('email.update');

//Route::get('/information', 'HomeController@information')->name('information');
Route::get('/statistics', 'GeneralController@statistics')->name('statistics');
