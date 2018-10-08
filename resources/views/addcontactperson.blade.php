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
    <select id="position" name="position_id"></select>
    <p>Направление в IT</p>
    <select id="direction" name="direction_id"></select>
    <p>IT компания в которой работает</p>
    <select id="companies" name="company_id"></select>
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
    <script src="/js/run2.js"></script>
</form>
@extends('layouts.footer')
