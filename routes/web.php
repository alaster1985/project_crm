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

Route::post('/sms', 'StudentsController@studentPersonaMobila')->name('sendSMS');


Route::get('addstudent', function () {
    return view('addstudent');
})->name('addstud');
Route::post('student/add', 'AddStudentController@store')->name('add.student');

Route::get('addcompany', function () {
    return view('addcompany');
})->name('addcomp');
Route::post('company/add', 'AddCompanyController@store')->name('add.company');

Route::get('addemployee', function () {
    return view('addemployee');
})->name('addempl');
Route::post('employee/add', 'AddEmployeeController@store')->name('add.employee');

Route::get('addcontactperson', function () {
    return view('addcontactperson');
})->name('addcontper');
Route::post('contacrperson/add', 'AddContactPersonController@store')->name('add.contactperson');

Route::get('addcomponent', function () {
    return view('addcomponent');
})->name('addcomponent');
Route::post('/addcomponent', 'AddComponentController@store')->name('add.component');

//JS

Route::get('students/groups', 'Dbrequest@groups');
Route::get('employees/directions', 'Dbrequest@direction');
Route::get('employees/students', 'Dbrequest@students');
Route::get('skills', 'Dbrequest@skills');
Route::get('company', 'Dbrequest@companies');
Route::get('position', 'Dbrequest@positions');
Route::get('direction', 'Dbrequest@direction');
Route::get('stacks', 'Dbrequest@stacks');

Route::get('communicationTools', 'Dbrequest@getCommunicationTools');
Route::get('learningStatus', 'Dbrequest@getLearningStatus');
Route::get('employmentStatus', 'Dbrequest@getEmploymentStatus');

Route::get('members', 'Dbrequest@member');


Route::post('employees/findstudents', 'Dbrequest@findStudents');
Route::post('employees/studentsdirection', 'Dbrequest@studentsDirection');
Route::post('employees/studentgroup', 'Dbrequest@studentsGroup');
Route::post('students/studentsgroupoutput', 'Dbrequest@studentsGroupsOutput');
Route::post('students/studentsalloutput', 'Dbrequest@studentsAllOutput');

Route::post('employees/findall', 'Dbrequest@findAll');

//JS GET DATA
Route::post('students/studedition', 'Dbrequest@studedit');
Route::post('students/getStudName', 'StudentsController@getStudentNameAddress');
Route::post('students/getStudentContacts', 'StudentsController@getStudentContacts');
Route::post('students/getStudyInfo', 'StudentsController@getStudyInfo');
Route::post('students/getSkills', 'StudentsController@getSkills');
Route::post('students/getStudyCompany','StudentsController@getStudyCompany');

//JS EDITION (O_o)
Route::post('students/ChangeName', 'StudentsController@studentChangeName')->name('studentChangeName');
Route::post('students/ChangeAddress', 'StudentsController@studentChangeAddress')->name('studentChangeAddress');
Route::post('students/ChangeCommTool', 'StudentsController@studentChangeCommTool')->name('studentChangeCommTool');
Route::post('students/ChangeContact', 'StudentsController@studentChangeContact')->name('studentChangeContact');
Route::post('students/ChangeContactComment', 'StudentsController@studentChangeContactComment')->name('studentChangeContactComment');
Route::post('students/ChangeSkill', 'StudentsController@studentChangeContactSkill')->name('studentChangeContactSkill');
Route::post('students/ChangeGroup', 'StudentsController@studentChangeContactGroup')->name('studentChangeContactGroup');
Route::post('students/ChangeLearningStatus', 'StudentsController@studentChangeContactLearningStatus')->name('studentChangeContactLearningStatus');
Route::post('students/ChangeEmploymentStatus', 'StudentsController@studentChangeContactEmploymentStatus')->name('studentChangeContactEmploymentStatus');
Route::post('students/ChangeDirection', 'StudentsController@studentChangeContactDirection')->name('studentChangeContactDirection');
Route::post('students/ChangeStartDate', 'StudentsController@studentChangeContactStartDate')->name('studentChangeContactStartDate');
Route::post('students/ChangeFinishDate', 'StudentsController@studentChangeContactFinishDate')->name('studentChangeContactFinishDate');
Route::post('students/ChangeHomecomingDate', 'StudentsController@studentChangeContactHomecomingDate')->name('studentChangeContactHomecomingDate');
Route::post('students/ChangeCompany', 'StudentsController@studentChangeContactCompany')->name('studentChangeContactCompany');
Route::post('students/ChangeCompanyPosition', 'StudentsController@studentChangeContactCompanyPosition')->name('studentChangeContactCompanyPosition');

Route::post('students/chgroup', 'StudentsController@studentChangeGroup')->name('studentChangeGroup');
Route::post('students/chearnstatus', 'StudentsController@studentChangeLearnStatus')->name('studentChangeLearnStatus');



