<?php
//Admin Login Routes
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function() {

    Route::get('/login','LoginController@index')->name('login');
    Route::post('/login','LoginController@login')->name('login.submit');
    Route::get('/logout','LoginController@logout')->name('logout');

});

Route::middleware('superadmin')->group(static function(){
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function(){
        Route::get('/dashboard','DashboardController@index')->name('dashboard');
        Route::get('/edit-profile','DashboardController@updateProfileForm')->name('edit.profile');
        Route::post('/edit-profile','DashboardController@updateProfile')->name('edit.profile');
        Route::get('/change-password','DashboardController@changePasswordForm')->name('change.password');
        Route::post('/change-password','DashboardController@changePassword')->name('change.password');
    });
});
Route::middleware('superadmin')->group(static function(){
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function(){
        Route::get('/school','SchoolController@index')->name('school.index');
        Route::get('/school/create','SchoolController@create')->name('school.create');
        Route::post('/school','SchoolController@store')->name('school.save');
        Route::get('/school/{school}','SchoolController@edit')->name('school.edit');
        Route::post('/school/{school}','SchoolController@update')->name('school.update');
        Route::get('/school/delete/{school}','SchoolController@destroy')->name('school.delete');
    });
});

