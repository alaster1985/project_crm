@extends('layouts.nav')
@section('title', 'Add Student')
<div class="container-fluid" style="background-color:#fdfdfd">

    <form action="{{Route('add.student')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <h3 id="title">Добавление нового студента</h3>
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
                <label for="communication_tool">Инструмент связи</label>
                <p></p>
                <p>Контакт</p>
                <p><input class="form-control" name="contact"></p>
                <select class="form-control" name="communication_tool">
                    <option value="mob1">mob1</option>
                    <option value="mob2">mob2</option>
                    <option value="email">email</option>
                    <option value="skype">skype</option>
                    <option value="Other">Other</option>
                </select>
                    <p>Коментарий</p>
                <p><input class="form-control" name="contact_comment"></p>
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="student_comment">Комментарий</label>
                <input class="form-control" name="student_comment">
                <p class="help-block">*не обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="skill_id">Скилл</label>
                <select class="form-control" id="skills" name="skill_id"></select>
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
                <label for="member_id">Ответственный HR</label>
                <div>
                    <select id="members" name="member_id" class="form-control"></select>
                </div>
                <p class="help-block">*не обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="companies">IT компания</label>
                <div>
                    <select id="companies" name="company_id" class="form-control"></select>
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
        <div><input type="submit" value="Add new student"></div>
        <script src="/js/run2.js"></script>
    </form>

</div>


@extends('layouts.footer')
