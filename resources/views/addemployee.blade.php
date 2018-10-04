@extends('layouts.nav')
@section('title', 'Add Employee')

<form action="{{Route('add.employee')}}" method="post" enctype="multipart/form-data">
    @csrf
    <p>Добавление нового сотрудника</p>
    <p>ФИО сотрудника</p>
    <p><input name="person_name"></p>
    <p>Адрес сотрудника</p>
    <p><input name="person_address"></p>
    <p>Должность сотрудника</p>
    <p><input name="position_id"></p>
    <p>Направление в IT</p>
    <p><input name="direction_id"></p>
    <p>IT компания в которой работает</p>
    <p><input name="company_id"></p>
    <p>Комментарий</p>
    <p><input name="employee_comment"></p>
    <p><input type="hidden" name="ASPT" value="0"/></p>
    <p><label><input type="checkbox" name="ASPT" value="1"/> Кандидат? </label></p>
    <p>Инструмент связи</p>
    <p><input name="communication_tool"></p>
    <p>Контакт</p>
    <p><input name="contact"></p>
    <p>Коментарий</p>
    <p><input name="contact_comment"></p>
    <p>Скилл</p>
    <p><input name="skill"></p>
    </br>
    <input type="submit" value="Add new employee">
</form>




@extends('layouts.footer')
