@extends('layouts.nav')
@section('title', 'Add Contact Person')
<div class="container-fluid">
    <form action="{{Route('add.contactperson')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Добавление нового контактного лица</p>
        <div class="row">

            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО контактного лица</label>
                <input class="form-control" name="person_name" placeholder="ФИО контактного лица">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес контактного лица</label>
                <input class="form-control" name="person_address" placeholder="Адрес контактного лица">
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="contact_person_comment">Комментарий</label>
                <input class="form-control" name="contact_person_comment">
                <p class="help-block">*не обязательное поле</p>
            </div>

            <div class="form-group col-md-2 col-sm-2">
                <label for="communication_tool">Инструмент связи</label>
                <p><input class="form-control" name="communication_tool"></p>
                <p>Контакт</p>
                <p><input class="form-control" name="contact"></p>
                <p>Коментарий</p>
                <p><input class="form-control" name="contact_comment"></p>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group  col-md-3 col-sm-3">
                <label for="direction">IT компания в которой работает</label>
                <select class="form-control" id="companies" name="company_id"></select>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group  col-md-3 col-sm-3">
                <label for="position">Должность контактного лица</label>
                <select class="form-control" id="position" name="position_id"></select>
                <p class="help-block">*не обязательное поле</p>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="direction">Направление в IT</label>
                <select class="form-control" id="direction" name="direction_id"></select>
                <p class="help-block">*не обязательное поле</p>
            </div>


        </div>


        <div><input type="submit" value="Add new contact person"></div>
        <script src="/js/run2.js"></script>
    </form>
</div>
@extends('layouts.footer')
