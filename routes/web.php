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
})->name('started');


Route::get('auth', function () {
    return view('auth');
});

Route::get('students', function () {
    return view('students');
})->name('stud');

Route::post('students', 'Db_controller@add')->name('add_student');



Route::get('students', 'Db_controller@show_students')->name('all_students');







//Route::get('test', function () {
//    return view('test');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
