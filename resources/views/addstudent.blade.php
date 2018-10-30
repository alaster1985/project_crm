@extends('layouts.nav')
@section('title', 'Add Student')
<div class="container-fluid">
    <form action="{{Route('add.student')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Добавление нового студента</p>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО студента</label>
                <input class="form-control" name="name" placeholder="ФИО студента">
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес студента</label>
                <input class="form-control" name="address" placeholder="Адрес студента">
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="groups">Группа</label>
                <div>
                    <select id="groups" name="group_id" class="form-control"></select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label for="learning_status">Статус обучения</label>
                <div>
                    <select class="form-control" name="learning_status">
                        <option value="learning">learning</option>
                        <option value="graduated">graduated</option>
                        <option value="fell_of">fell_of</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="student_comment">Комментарий</label>
                <input class="form-control" name="student_comment">
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="skill_id">Скилл</label>
                <select class="form-control" id="skills" size="4" name="skill_id" multiple></select>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label for="rez">Резюме</label>
                <input type="file" name="file" id="fileToUpload">
                <p class="help-block">*не обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="employment_status">Статус трудоустройства</label>
                <div>
                    <select name="employment_status" class="form-control">
                        <option value="employed">employed</option>
                        <option value="in_search">in_search</option>
                        <option value="not_relevant_in_IT">not_relevant_in_IT</option>
                        <option value="refused">refused</option>
                        <option value="in_IT_not_in_direction">in_IT_not_in_direction</option>
                        <option value="Other">Other</option>
                    </select>
                    <p class="help-block">*не обязательное поле</p>
                </div>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label for="members">Ответственный HR</label>
                <div>
                    <select id="members" name="member_id" class="form-control"></select>
                </div>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="companies">IT компания</label>
                <div>
                    <select id="companies" name="company_id" class="form-control" ></select>
                </div>
                <p class="help-block">*не обязательное поле</p>
            </div>

            <div class="form-group col-md-2 col-sm-2">
                <label for="position">Должность</label>
                <div>
                    <select id="position" name="position_id" class="form-control"></select>
                </div>
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
        <div><input type="submit" value="Add new student"></div>
        <script src="/js/run2.js"></script>
    </form>
</div>

@extends('layouts.footer')
