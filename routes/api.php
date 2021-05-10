<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('student/login', 'Api\UserController@StudentLogin');
Route::post('teacher/login', 'Api\UserController@TeacherLogin');
Route::get('calendar/events', 'Api\CalendarController@index');


Route::group(['prefix'=>'teacher'],function(){
	Route::get('class/routine', 'Api\ClassRoutineController@index');
});

Route::group(['prefix'=>'student'],function(){
	Route::get('class/routine', 'Api\ClassRoutineController@index');
});
