@extends('layouts.nav')
@section('title', 'Add Student')

<form action="{{Route('add.student')}}" method="post" enctype="multipart/form-data">
    @csrf
    <p>Добавление нового студента</p>
    <p>ФИО студента</p>
    <p><input name="person_name"></p>
    <p>Адрес студента</p>
    <p><input name="person_address"></p>
    <p>Группа</p>
    <p><input name="group_id"></p>
    <p>Статус обучения</p>
    <select name="learning_status">
        <option value="learning">learning</option>
        <option value="graduated">graduated</option>
        <option value="fell_of">fell_of</option>
        <option value="Other">Other</option>
    </select>
    <p>Статус трудоустройства</p>
    <select name="employment_status">
        <option value="employed">employed</option>
        <option value="in_search">in_search</option>
        <option value="not_relevant_in_IT">not_relevant_in_IT</option>
        <option value="refused">refused</option>
        <option value="in_IT_not_in_direction">in_IT_not_in_direction</option>
        <option value="Other">Other</option>
    </select>
    <p>Ответственный HR</p>
    <p><input name="member_id"></p>
    <p>IT компания</p>
    <p><input name="company_id"></p>
    <p>Должность</p>
    <p><input name="position_id"></p>
    <p>Резюме</p>
    <p><input type="file" name="file" id="fileToUpload">
    <p>Комментарий</p>
    <p><input name="student_comment"></p>
    <p>Инструмент связи</p>
    <p><input name="communication_tool"></p>
    <p>Контакт</p>
    <p><input name="contact"></p>
    <p>Коментарий</p>
    <p><input name="contact_comment"></p>
    <p>Скилл</p>
    <p><input name="skill"></p>
    </br>
    <input type="submit" value="Add new student">
</form>
@extends('layouts.footer')
