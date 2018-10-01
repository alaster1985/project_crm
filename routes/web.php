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
Route::middleware('auth')->group(function () {

    Route::get('auth', function () {
        return view('auth');
    })->name('index');

    Route::get('/', function () {
        return view('welcome');
    })->name('index');


    Route::post('addimage', 'Files@addImage')->name('add.image');

    Route::post('students/add', 'StudentsController@addStudent')->name('add.student');
    Route::get('students', 'StudentsController@showStudents')->name('ShowAllStudents');
    Route::get('students/show/{id}', 'StudentsController@studentPersonaView')->name('student.view');

    Route::post('employees/add', 'EmployeesController@addEmployee')->name('add.employee');
    Route::get('employees', 'EmployeesController@showEmployees')->name('show.employees');
    Route::get('employees/show/{id}', 'EmployeesController@emploeePersonaView')->name('employee.view');

    Route::post('groups/add', 'GroupController@addGroup')->name('add.group');
    Route::get('groups', 'GroupController@showGroups')->name('show.groups');
    Route::get('groups/show/{id}', 'GroupController@groupPersonaView')->name('group.view');
});

//Route::get('test', function () {
//    return view('test');
//});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/SMS', 'SmsController@sendSms')->name('SMS');


//JS

Route::get('employees/groups', 'Dbrequest@groups');
Route::get('employees/directions', 'Dbrequest@direction');
Route::get('employees/students', 'Dbrequest@students');

