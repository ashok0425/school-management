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
        Route::get('/school/edit','SchoolController@edit')->name('school.edit');
        Route::post('/school/{school}','SchoolController@update')->name('school.update');
        Route::get('/school/delete','SchoolController@destroy')->name('school.delete');
    });
});

Route::middleware('superadmin')->group(static function(){
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function(){
        Route::get('/page','PageController@index')->name('page.index');
        Route::get('/page/create','PageController@create')->name('page.create');
        Route::post('/page','PageController@store')->name('page.save');
        Route::post('/page/fileupload','PageController@fileUpload')->name('page.image.upoad');
        Route::get('/page/edit','PageController@edit')->name('page.edit');
        Route::post('/page/{page}','PageController@update')->name('page.update');
        Route::get('/page/delete','PageController@destroy')->name('page.delete');
        
    });
});

Route::middleware('superadmin')->group(static function(){
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function(){
        Route::get('/advertisement','AdvertisementController@index')->name('advertisement.index');
        Route::get('/advertisement/create','AdvertisementController@create')->name('advertisement.create');
        Route::post('/advertisement','AdvertisementController@store')->name('advertisement.save');
        Route::get('/advertisement/edit/{advertisement}','AdvertisementController@edit')->name('advertisement.edit');
        Route::post('/advertisement/{advertisement}','AdvertisementController@update')->name('advertisement.update');
        Route::get('/advertisement/delete/{advertisement}','AdvertisementController@destroy')->name('advertisement.delete');
    });
});



Route::middleware('superadmin')->group(static function(){
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function(){
        Route::get('/information/__list','InformationController@index')->name('information.index');
        Route::get('/information/create','InformationController@create')->name('information.create');
        Route::post('/information/save','InformationController@store')->name('information.save');
        Route::get('/information/edit','InformationController@edit')->name('information.edit');
        Route::post('/information/update','InformationController@update')->name('information.update');  
        Route::get('/information/delete','InformationController@destroy')->name('information.delete');
    });
});


Route::middleware('superadmin')->group(static function(){
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function(){
        Route::get('/gallery/__list','GalleryController@index')->name('gallery.index');
        Route::get('/gallery/create','GalleryController@create')->name('gallery.create');
        Route::post('/gallery/save','GalleryController@store')->name('gallery.save');
        Route::get('/gallery/edit','GalleryController@edit')->name('gallery.edit');
        Route::post('/gallery/update','GalleryController@update')->name('gallery.update');  
        Route::get('/gallery/delete','GalleryController@destroy')->name('gallery.delete');
    });
});


Route::middleware('superadmin')->group(static function(){
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function(){
        Route::get('/imagegallery/__list','GalleryImageController@index')->name('imagegallery.index');
        Route::get('/imagegallery/create','GalleryImageController@create')->name('imagegallery.create');
        Route::post('/imagegallery/save','GalleryImageController@store')->name('imagegallery.save');
        Route::get('/imagegallery/edit','GalleryImageController@edit')->name('imagegallery.edit');
        Route::post('/imagegallery/update','GalleryImageController@update')->name('imagegallery.update');  
        Route::get('/imagegallery/delete','GalleryImageController@destroy')->name('imagegallery.delete');
    });
});

Route::middleware('superadmin')->group(static function(){
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(static function(){
        Route::get('/faq/__list','FaqController@index')->name('faq.index');
        Route::get('/faq/create','FaqController@create')->name('faq.create');
        Route::post('/faq/save','FaqController@store')->name('faq.save');
        Route::get('/faq/edit','FaqController@edit')->name('faq.edit');
        Route::post('/faq/update','FaqController@update')->name('faq.update');  
        Route::get('/faq/delete','FaqController@destroy')->name('faq.delete');
    });
});
