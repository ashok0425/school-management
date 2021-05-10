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


// Route::get('/login','Admin\LoginController@logout')->name('login');

Route::get('/logout','Admin\LoginController@logout')->name('logout');

// Gallery page
Route::get('/gallery','Frontend\GalleryController@showGallery')->name('frontend.gallery');
// Gallery images page 
Route::get('/gallery/images','Frontend\GalleryController@showGalleryImage')->name('frontend.gallery.image');
// About us page 
Route::get('/aboutus','Frontend\PageController@About')->name('frontend.aboutus');
// Term and Conditions
Route::get('/termandconditions','Frontend\PageController@Term')->name('frontend.term');
// Privacy Policy
Route::get('/privacyandpolicy','Frontend\PageController@Privacy')->name('frontend.Privacy');
// Faq
Route::get('/faq','Frontend\FaqController@Faq')->name('frontend.faq');


