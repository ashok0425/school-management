<?php

use App\Http\Controllers\School\AssignTeacherController;

Route::prefix('school')->namespace('School')->name('school.')->group(static function () {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.submit');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/register', 'LoginController@showForm')->name('register');
    Route::post('/register', 'LoginController@store')->name('register');
    Route::post('/resendverification', 'LoginController@resendVerifyLink')->name('resendverfication');
    Route::get('/verify/{token}', 'LoginController@verifyUser')->name('verify');
    Route::get('/forgotpassword', 'LoginController@forgotPassword')->name('forgotpassword');
    Route::post('/forgotpassword', 'LoginController@forgotPasswordSendEmail')->name('forgotpassword');
    Route::get('/new-password/{token}', 'LoginController@verifyResetLink')->name('resetpassword');
    Route::post('/new-password', 'LoginController@savePassword')->name('resetpassword');

});

Route::middleware('school')->group(static function () {
    Route::prefix('school')->namespace('School')->name('school.')->group(static function () {

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/teacher', 'TeacherController@index')->name('teacher');

        Route::get('/edit-profile', 'DashboardController@editProfile')->name('edit.profile');
        Route::post('/edit-profile', 'DashboardController@updateProfile')->name('edit.profile');
        Route::post('/change-password', 'DashboardController@changePassword')->name('change.password');
        Route::get('/change-password', 'DashboardController@changePasswordForm')->name('change.password');

        Route::post('/toogleteacher', 'TeacherController@toggleStatusTeacher')->name('toogle.status.teacher');
        
        Route::post('/togglestudent', 'StudentController@toggleStatusStudent')->name('toogle.status.student'); 


        //assign teacher
        Route::get('/assign-teacher/create', 'AssignTeacherController@create')->name('assignteacher.create');
        Route::post('/assign-teacher/store', 'AssignTeacherController@store')->name('assignteacher.store');

        //assign student
        Route::get('/assign-student/create', 'AssignStudentController@create')->name('assignstudent.create');
        Route::post('/assign-student/store', 'AssignStudentController@store')->name('assignstudent.store');

    });
});

Route::middleware('school')->group(static function () {
    Route::prefix('school')->namespace('School')->name('school.')->group(static function () {
        Route::get('/teacher', 'TeacherController@index')->name('teacher');
        Route::get('/teacher/create', 'TeacherController@show')->name('teacher.create');
        Route::post('/teacher/save', 'TeacherController@store')->name('teacher.save');
        Route::get('/teacher/edit', 'TeacherController@edit')->name('teacher.edit');
        Route::post('/teacher/update/{user}', 'TeacherController@update')->name('teacher.update');
        Route::get('/teacher/delete', 'TeacherController@destroy')->name('teacher.delete');

        Route::post('/teacher/filter', 'TeacherController@teacherFilter')->name('teacher.filter');
    });
});

Route::middleware('school')->group(static function () {
    Route::prefix('school')->namespace('School')->name('school.')->group(static function () {
        Route::get('/level', 'LevelController@index')->name('level');
        Route::get('/level/create', 'LevelController@show')->name('level.create');
        Route::post('/level/save', 'LevelController@store')->name('level.save');
        Route::get('/level/edit', 'LevelController@edit')->name('level.edit');
        Route::post('/level/update/{level}', 'LevelController@update')->name('level.update');
        Route::get('/level/delete', 'LevelController@destroy')->name('level.delete');
    });
});

Route::middleware('school')->group(static function () {
    Route::prefix('school')->namespace('School')->name('school.')->group(static function () {
        Route::get('/class', 'KlassController@index')->name('class');
        Route::get('/class/create', 'KlassController@show')->name('class.create');
        Route::post('/class/save', 'KlassController@store')->name('class.save');
        Route::get('/class/edit', 'KlassController@edit')->name('class.edit');
        Route::post('/class/update/{class}', 'KlassController@update')->name('class.update');
        Route::get('/class/delete', 'KlassController@destroy')->name('class.delete');


        Route::get('/assignClassTeacher', 'KlassController@assignClassTeacher')->name('assignClassTeacher');

        Route::get('/routine/list', 'RoutineController@index')->name('routine');
        Route::get('/routine/create/view', 'RoutineController@create')->name('create.routine');
        Route::post('/routine/add', 'RoutineController@store')->name('routine.add');
        Route::post('/getSectionFromClass', 'RoutineController@getSectionFromClass')->name('getSectionFromClass');
        Route::post('/school/routine/by/filter', 'RoutineController@getSchoolRoutineByClassAndSection')->name('routine.by.filter');
    });
});

Route::middleware('school')->group(static function () {
    Route::prefix('school')->namespace('School')->name('school.')->group(static function () {
        Route::get('/section', 'SectionController@index')->name('section');
        Route::get('/section/create', 'SectionController@show')->name('section.create');
        Route::post('/section/save', 'SectionController@store')->name('section.save');
        Route::get('/section/edit', 'SectionController@edit')->name('section.edit');
        Route::post('/section/update/{section}', 'SectionController@update')->name('section.update');
        Route::get('/section/delete/{section}', 'SectionController@destroy')->name('section.delete');
    });
});

Route::middleware('school')->group(static function () {
    Route::prefix('school')->namespace('School')->name('school.')->group(static function () {
        Route::get('/subject', 'SubjectController@index')->name('subject');
        Route::get('/subject/create', 'SubjectController@show')->name('subject.create');
        Route::post('/subject/save', 'SubjectController@store')->name('subject.save');
        Route::get('/subject/edit', 'SubjectController@edit')->name('subject.edit');
        Route::post('/subject/update', 'SubjectController@update')->name('subject.update');
        Route::get('/subject/delete', 'SubjectController@destroy')->name('subject.delete');

        Route::get('subject/assignSubjectTeacher', 'SubjectController@assignSubjectTeacher')->name('subject.assignSubjectTeacher');
        Route::post('/subject/insertSubjectTeacher', 'SubjectController@insertSubjectTeacher')->name('subject.insertSubjectTeacher');
    });
});


Route::middleware('school')->group(static function () {
    Route::prefix('school')->namespace('School')->name('school.')->group(static function () {
        Route::get('/student', 'StudentController@index')->name('student');
        Route::get('/student/create', 'StudentController@create')->name('student.create');
        Route::post('/student/save', 'StudentController@store')->name('student.save');
        Route::get('/student/edit', 'StudentController@edit')->name('student.edit');
        Route::post('/student/update/{student}', 'StudentController@update')->name('student.update');
        Route::get('/student/delete', 'StudentController@destroy')->name('student.delete');
        Route::get('/verify/students/{token}', 'StudentController@verifyStudents');

        Route::post('/uploadexcel','StudentController@uploadExcel')->name('upload');

        Route::post('/student/filter', 'StudentController@filterStudent')->name('student.filter');
    });
});

Route::middleware('school')->group(static function () {
    Route::prefix('school')->namespace('School')->name('school.')->group(static function () {
        Route::get('/library', 'LibraryController@index')->name('library');

        //Books Controller
        Route::get('/books', 'BooksController@index')->name('books');
        Route::post('/books/add', 'BooksController@store')->name('books.add');
        Route::get('/books/edit/{books}', 'BooksController@edit')->name('books.edit');
        Route::post('/books/update/{books}', 'BooksController@update')->name('books.update');
        Route::delete('/books/delete/{books}', 'BooksController@destroy')->name('books.delete');

        //Category Controller
        Route::get('/category/add', 'CategoryController@index')->name('category');
        Route::post('/category/store', 'CategoryController@store')->name('category.save');
        Route::post('/category/update/{categories}', 'CategoryController@update')->name('category.update');
        Route::delete('/category/delete/{categories}', 'CategoryController@destroy')->name('category.delete');

        //Assign Books Controller
        Route::get('/assignbooks', 'AssignBooksController@index')->name('assignbooks');
        Route::post('/assignbooks/add', 'AssignBooksController@store')->name('assignbooks.add');
        Route::delete('/assignbooks/delete/{assignbooks}', 'AssignBooksController@destroy')->name('assignbooks.delete');
        Route::patch('/assignbooks/updatedate/{assignbooks}', 'AssignBooksController@updatedate')->name('assignbooks.update');
        //Calendar Controller
        Route::get('/calendar', 'CalendarController@index')->name('calendar');
        Route::post('/calendar', 'CalendarController@store')->name('calendar.add');

        // Notification Controller 
        Route::get('/notification/list', 'NotificationController@index')->name('calendar');
        Route::get('/notification/create', 'NotificationController@create')->name('notification.create');
        Route::post('/notification/store', 'NotificationController@store')->name('notification.store');
        Route::get('/notification/delete', 'NotificationController@delete');

        Route::get('/notification/getsection/{id}', 'NotificationController@GetSection');
    });
});



