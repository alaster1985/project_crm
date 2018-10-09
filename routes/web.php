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

    Route::get('students', 'StudentsController@showStudents')->name('ShowAllStudents');
    Route::get('students/show/{id}', 'StudentsController@studentPersonaView')->name('student.view');

    Route::get('employees', 'EmployeesController@showEmployees')->name('show.employees');
    Route::get('employees/show/{id}', 'EmployeesController@emploeePersonaView')->name('employee.view');

    Route::get('companies', 'CompaniesController@showCompanies')->name('ShowCompanies');
    Route::get('companies/show/{id}', 'CompaniesController@companyPersonalView')->name('company.view');

    Route::get('tasks', 'TasksController@showTasks')->name('showTasks');
    Route::get('tasks/show/{id}', 'TasksController@tasksView')->name('tasks.view');

    Route::post('groups/add', 'GroupController@addGroup')->name('add.group');
    Route::get('groups', 'GroupController@showGroups')->name('show.groups');
    Route::get('groups/show/{id}', 'GroupController@groupPersonaView')->name('group.view');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sms', 'SmsController@index')->name('index');
Route::post('/sms', 'SmsController@sendSMS')->name('sendSMS');



Route::get('addstudent', function () {
    return view('addstudent');
})->name('addstud');
Route::post('student/add', 'AddStudentController@addStudent')->name('add.student');

Route::get('addcompany', function () {
    return view('addcompany');
})->name('addcomp');
Route::post('company/add', 'AddCompanyController@addCompany')->name('add.company');

Route::get('addemployee', function () {
    return view('addemployee');
})->name('addempl');
Route::post('employee/add', 'AddEmployeeController@addEmployee')->name('add.employee');

Route::get('addcontactperson', function () {
    return view('addcontactperson');
})->name('addcontper');
Route::post('contacrperson/add', 'AddContactPersonController@addContactPerson')->name('add.contactperson');

//JS

Route::get('employees/groups', 'Dbrequest@groups');
Route::get('employees/directions', 'Dbrequest@direction');
Route::get('employees/students', 'Dbrequest@students');
Route::get('skills', 'Dbrequest@skills');
Route::get('company', 'Dbrequest@companies');
Route::get('position', 'Dbrequest@positions');
Route::get('direction', 'Dbrequest@direction');

Route::post('employees/findstudents', 'Dbrequest@findStudents');

Route::post('employees/studedition', 'Dbrequest@studedit');




