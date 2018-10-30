@extends('layouts.nav')
@section('title', 'Add Employee')
<div class="container-fluid">
    <form action="{{Route('add.employee')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Добавление нового сотрудника</p>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО сотрудника</label>
                <input class="form-control" name="name" placeholder="ФИО сотрудника">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес сотрудника</label>
                <input class="form-control" name="address" placeholder="Адрес сотрудника">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="groups">Должность сотрудника</label>
                <div>
                    <select class="form-control" id="position" name="position_id">
                        <option selected>Выберите должность</option>
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-2 col-sm-2">
                <label for="groups">Направление в IT</label>
                <div>
                    <select class="form-control" id="direction" name="direction_id">
                        <option selected>Выберите направление</option>
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="groups">IT компания в которой работает</label>
                <div>
                    <select class="form-control" id="companies" name="company_id">
                        <option selected>Выберите компанию</option>
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="employee_comment">Комментарий</label>
                <input class="form-control" name="employee_comment" placeholder="Комментарий">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="skills">Скилл</label>
                <select class="form-control" id="skills" size="4" name="skill_id[]" multiple>
                    <option selected value="">Отсутствует</option>
                </select>
                <p class="help-block">*не обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <input class="form-control" type="hidden" name="ASPT" value="0"/>
                <label><input type="checkbox" name="ASPT" value="1"/> Кандидат? </label>
                <p class="help-block">*обязательное поле</p>
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
        <div><input type="submit" value="Add new employee"></div>
        <script src="/js/run2.js"></script>
    </form>
</div>


@extends('layouts.footer')
