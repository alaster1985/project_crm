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

Route::post('students/add', 'StudentsController@addStudent')->name('add.student');
Route::get('students', 'StudentsController@showStudents')->name('ShowAllStudents');
Route::get('students/show/{id}', 'StudentsController@studentPersonaView')->name('student.view');

Route::post('employees/add', 'EmployeesController@addEmployee')->name('add.employee');
Route::get('employees', 'EmployeesController@showEmployees')->name('show.employees');
Route::get('employees/show/{id}', 'EmployeesController@emploeePersonaView')->name('employee.view');



//Route::get('test', function () {
//    return view('test');
//});