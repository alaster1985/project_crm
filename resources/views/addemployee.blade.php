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
    <select id="position" name="position_id"></select>
    <p>Направление в IT</p>
    <select id="direction" name="direction_id"></select>
    <p>IT компания в которой работает</p>
    <select id="companies" name="company_id"></select>
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
    <select id="skills" name="skill_id"></select>
    </br>
    <input type="submit" value="Add new employee">
    <script src="/js/run2.js"></script>
</form>




@extends('layouts.footer')
