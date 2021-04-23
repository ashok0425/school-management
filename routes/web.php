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
    return view('website.index');
});

Route::get('/price-plans', function () {
    return view('website.plans');
});
Route::get('/services', function () {
    return view('website.services');
});
Route::get('/faq', function () {
    return view('website.faq');
});
Route::get('/contact-us', function () {
    return view('website.contacts');
});
Route::get('/terms-and-conditions', function () {
    return view('website.termsandconditions');
});

// Route::get('/login','Admin\LoginController@logout')->name('login');

Route::get('/logout','Admin\LoginController@logout')->name('logout');

