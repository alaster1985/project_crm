@extends('layouts.nav')
@section('title', 'Add Company')

<form action="{{Route('add.company')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <p>Добавление новой компании</p>
    <p>Название компании</p>
    <p><input name="company_name"></p>
    <p>Адрес офиса компании</p>
    <p><input name="company_address"></p>
    <p>Сайт</p>
    <p><input name="site"></p>
    <p>Статус взаимодействия</p>
    <select name="status">
        <option value="Партнеры">Партнеры</option>
        <option value="Ведется диалог">Ведется диалог</option>
        <option value="Потенциальные">Потенциальные</option>
        <option value="Неотслеживаемые">Неотслеживаемые</option>
    </select>
    <p>Тип сотрудничества</p>
    <select name="type">
        <option value="Трудоустройство">Трудоустройство</option>
        <option value="Информационное">Информационное</option>
        <option value="партнерство">партнерство</option>
        <option value="Проведение мероприятий">Проведение мероприятий</option>
        <option value="Отсутствует">Отсутствует</option>
    </select>
    <p>Стэк технологий</p>
    <select id="stacks" name="stack_id"></select>
    <p>Комментарий к стэк-технологии</p>
    <p><input name="stack_comment"></p>
    <p>Логотип</p>
    <p><input type="file" name="file" id="fileToUpload">
    <p>Комментарий</p>
    <p><input name="company_comment"></p>
    <script src="/js/run2.js"></script>
    <input type="submit" value="Add new company">
</form>
@extends('layouts.footer')
