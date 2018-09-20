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
})->name('index');

Route::get('auth', function () {
    return view('auth');
});

//Route::get('students', function () {
//    return view('students');
//})->name('stud');

Route::post('students/add', 'StudentsController@addStudent')->name('add.student');

Route::get('students', 'StudentsController@showStudents')->name('ShowAllStudents');



//Route::get('test', function () {
//    return view('test');
//});