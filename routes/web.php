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

Route::get('/login','Admin\LoginController@index')->name('login');

Route::post('/login','Admin\LoginController@login')->name('login.submit');

Route::get('/logout','Admin\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function() {
        Route::get('/dashboard','TeacherController@index')->name('dashboard');
        Route::get('/teacher/create','TeacherController@show')->name('teacher.create');
        Route::post('/teacher/save','TeacherController@store')->name('teacher.save');
        Route::get('/teacher/edit/{user}','TeacherController@edit')->name('teacher.edit');
        Route::post('/teacher/update/{user}','TeacherController@update')->name('teacher.update');
        Route::get('/teacher/delete/{user}','TeacherController@destroy')->name('teacher.delete');
    });
});

Route::middleware(['auth'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function() {
        Route::get('/level','LevelController@index')->name('level');
        Route::get('/level/create','LevelController@show')->name('level.create');
        Route::post('/level/save','LevelController@store')->name('level.save');
        Route::get('/level/edit/{level}','LevelController@edit')->name('level.edit');
        Route::post('/level/update/{level}','LevelController@update')->name('level.update');
        Route::get('/level/delete/{level}','LevelController@destroy')->name('level.delete');
    });
});

Route::middleware(['auth'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function() {
        Route::get('/class','KlassController@index')->name('class');
        Route::get('/class/create','KlassController@show')->name('class.create');
        Route::post('/class/save','KlassController@store')->name('class.save');
        Route::get('/class/edit/{klass}','KlassController@edit')->name('class.edit');
        Route::post('/class/update/{klass}','KlassController@update')->name('class.update');
        Route::get('/class/delete/{klass}','KlassController@destroy')->name('class.delete');
    });
});

Route::middleware(['auth'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function() {
        Route::get('/subject','SubjectController@index')->name('subject');
        Route::get('/subject/create','SubjectController@show')->name('subject.create');
        Route::post('/subject/save','SubjectController@store')->name('subject.save');
        Route::get('/subject/edit/{subject}','SubjectController@edit')->name('subject.edit');
        Route::post('/subject/update/{subject}','SubjectController@update')->name('subject.update');
        Route::get('/subject/delete/{subject}','SubjectController@destroy')->name('subject.delete');
    });
});