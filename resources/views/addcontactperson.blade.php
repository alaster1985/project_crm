@extends('layouts.nav')
@section('title', 'Add Contact Person')
<div class="container-fluid">
    <form action="{{Route('add.contactperson')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Добавление нового контактного лица</p>
        <div class="row">

            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО контактного лица</label>
                <input class="form-control" name="name" placeholder="ФИО контактного лица">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес контактного лица</label>
                <input class="form-control" name="address" placeholder="Адрес контактного лица">
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="contact_person_comment">Комментарий</label>
                <input class="form-control" name="contact_person_comment">
                <p class="help-block">*не обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group  col-md-3 col-sm-3">
                <label for="direction">IT компания в которой работает</label>
                <select class="form-control" id="companies" name="company_id">
                    <option selected>Выберите компанию</option>
                </select>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group  col-md-3 col-sm-3">
                <label for="position">Должность контактного лица</label>
                <select class="form-control" id="position" name="position_id">
                    <option selected>Выберите должность</option>
                </select>
                <p class="help-block">*не обязательное поле</p>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="direction">Направление в IT</label>
                <select class="form-control" id="direction" name="direction_id">
                    <option selected>Выберите направление</option>
                </select>
                <p class="help-block">*не обязательное поле</p>
            </div>


        </div>

        <p><label>Контакты</label></p>
        <div class="row">
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Мобильный 1</label>
                <p>Номер телефона</p>
                <input hidden name="contacts[0][communication_tool]" value="mob1">
                <p><input class="form-control" name="contacts[0][contact]"></p>
                <p>Коментарий</p>
                <p><input class="form-control" name="contacts[0][comment]"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Мобильный 2</label>
                <p>Номер телефона</p>
                <input hidden name="contacts[1][communication_tool]" value="mob2">
                <p><input class="form-control" name="contacts[1][contact]"></p>
                <p>Коментарий</p>
                <p><input class="form-control" name="contacts[1][comment]"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Электронная почта</label>
                <p>мыло</p>
                <input hidden name="contacts[2][communication_tool]" value="email">
                <p><input class="form-control" name="contacts[2][contact]"></p>
                <p>Коментарий</p>
                <p><input class="form-control" name="contacts[2][comment]"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Скайп</label>
                <p>Скайп</p>
                <input hidden name="contacts[3][communication_tool]" value="skype">
                <p><input class="form-control" name="contacts[3][contact]"></p>
                <p>Коментарий</p>
                <p><input class="form-control" name="contacts[3][comment]"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Другое</label>
                <p>Контакт</p>
                <input hidden name="contacts[4][communication_tool]" value="Other">
                <p><input class="form-control" name="contacts[4][contact]"></p>
                <p>Коментарий</p>
                <p><input class="form-control" name="contacts[4][comment]"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
        </div>
        <div><input type="submit" value="Add new contact person"></div>
        <script src="/js/run2.js"></script>
    </form>
</div>
@extends('layouts.footer')
