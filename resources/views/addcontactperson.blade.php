@extends('layouts.nav')
@section('title', 'Add Contact Person')

<form action="{{Route('add.contactperson')}}" method="post" enctype="multipart/form-data">
    @csrf
    <p>Добавление нового контактного лица</p>
    <p>ФИО контактного лица</p>
    <p><input name="person_name"></p>
    <p>Адрес контактного лица</p>
    <p><input name="person_address"></p>
    <p>Должность контактного лица</p>
    <p><input name="position_id"></p>
    <p>Направление в IT</p>
    <p><input name="direction_id"></p>
    <p>IT компания в которой работает</p>
    <p><input name="company_id"></p>
    <p>Комментарий</p>
    <p><input name="contact_person_comment"></p>
    <p>Инструмент связи</p>
    <p><input name="communication_tool"></p>
    <p>Контакт</p>
    <p><input name="contact"></p>
    <p>Коментарий</p>
    <p><input name="contact_comment"></p>
    </br>
    <input type="submit" value="Add new contact person">
</form>
@extends('layouts.footer')
