@extends('layouts.nav')
@section('title', 'Add Company')

<div class="container-fluid">
    <form action="{{Route('add.company')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Добавление новой компании</p>

        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">Название компании</label>
                <input class="form-control" name="company_name" placeholder="Название компании">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="company_address">Адрес офиса компании</label>
                <input class="form-control" name="company_address" placeholder="Адрес офиса компании">
                <p class="help-block">*обязательное поле</p>
            </div>


            <div class="form-group col-md-3 col-sm-2">
                <label for="site">Сайт</label>
                <input class="form-control" name="site" placeholder="Сайт">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-2 col-sm-2">
                <label for="file">Логотип</label>
                <input type="file" name="file" id="fileToUpload">
                <p class="help-block">*не обязательное поле</p>
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-3 col-sm-2">
                <label for="company_comment">Комментарий</label>
                <input class="form-control" name="company_comment">
                <p class="help-block">*не обязательное поле</p>
            </div>


            <div class="form-group col-md-3 col-sm-2">
                <label for="status">Статус взаимодействия</label>
                <div>
                    <select class="form-control" name="status">
                        <option value="Партнеры">Партнеры</option>
                        <option value="Ведется диалог">Ведется диалог</option>
                        <option value="Потенциальные">Потенциальные</option>
                        <option value="Неотслеживаемые">Неотслеживаемые</option>
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>



            <div class="form-group col-md-3 col-sm-2">
                <label for="type">Тип сотрудничества</label>
                <div>
                    <select class="form-control" name="type">
                        <option value="Трудоустройство">Трудоустройство</option>
                        <option value="Информационное">Информационное</option>
                        <option value="партнерство">партнерство</option>
                        <option value="Проведение мероприятий">Проведение мероприятий</option>
                        <option value="Отсутствует">Отсутствует</option>
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-2 col-sm-2">
                <label for="stack">Стэк технологий</label>
                <div>
                    <select class="form-control" id="stacks" name="stack_id"></select>
                </div>
                <p>Комментарий к стэк-технологии</p>
                <p><input class="form-control" name="stack_comment"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
        </div>
        <script src="/js/run2.js"></script>
        <div><input type="submit" value="Add new company"></div>

    </form>
</div>
@extends('layouts.footer')
