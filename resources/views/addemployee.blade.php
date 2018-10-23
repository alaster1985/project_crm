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
                    <select class="form-control" id="position" name="position_id"></select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-2 col-sm-2">
                <label for="groups">Направление в IT</label>
                <div>
                    <select class="form-control" id="direction" name="direction_id"></select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="groups">IT компания в которой работает</label>
                <div>
                    <select class="form-control" id="companies" name="company_id"></select>
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
                <select class="form-control" id="skills" name="skill_id"></select>
                <p class="help-block">*не обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <input class="form-control" type="hidden" name="ASPT" value="0"/>
                <label><input type="checkbox" name="ASPT" value="1"/> Кандидат? </label>
                <p class="help-block">*обязательное поле</p>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="communication_tool">Инструмент связи</label>
                <select class="form-control" name="communication_tool">
                    <option value="mob1">mob1</option>
                    <option value="mob2">mob2</option>
                    <option value="email">email</option>
                    <option value="skype">skype</option>
                    <option value="Other">Other</option>
                </select>
                <p>Контакт</p>
                <p><input class="form-control" name="contact"></p>
                <p>Коментарий</p>
                <p><input class="form-control" name="contact_comment"></p>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <div><input type="submit" value="Add new employee"></div>
        <script src="/js/run2.js"></script>
    </form>
</div>


@extends('layouts.footer')
