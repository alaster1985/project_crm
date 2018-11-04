@extends('layouts.nav')
@section('title', 'Add Company')

<div class="container-fluid">
    <form action="{{Route('add.company')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Добавление новой компании</p>

        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">Название компании</label>
                @if ($errors->has('company_name'))
                    <div style="color: red">{{($errors->first('company_name'))}}</div>
                @endif
                <input class="form-control" name="company_name" value="{{old('company_name')}}" placeholder="Название компании">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">Адрес офиса компании</label>
                @if ($errors->has('address'))
                    <div style="color: red">{{($errors->first('address'))}}</div>
                @endif
                <input class="form-control" name="address" value="{{old('address')}}" placeholder="Адрес офиса компании">
                <p class="help-block">*обязательное поле</p>
            </div>


            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">Сайт</label>
                @if ($errors->has('site'))
                    <div style="color: red">{{($errors->first('site'))}}</div>
                @endif
                <input class="form-control" name="site" value="{{old('site')}}" placeholder="Сайт">
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
                <input class="form-control" name="company_comment" value="{{old('company_comment')}}">
                <p class="help-block">*не обязательное поле</p>
            </div>


            <div class="form-group col-md-3 col-sm-2">
                <label for="status">Статус взаимодействия</label>
                @if ($errors->has('status'))
                    <div style="color: red">{{($errors->first('status'))}}</div>
                @endif
                <div>
                    <select class="form-control" name="status">
                        <option selected disabled @if (old('status') == '') selected="selected" @endif>Выберите статус взаимодействия</option>
                        <option value="Партнеры" @if (old('status') == 'Партнеры') selected="selected" @endif>Партнеры</option>
                        <option value="Ведется диалог" @if (old('status') == 'Ведется диалог') selected="selected" @endif>Ведется диалог</option>
                        <option value="Потенциальные" @if (old('status') == 'Потенциальные') selected="selected" @endif>Потенциальные</option>
                        <option value="Неотслеживаемые" @if (old('status') == 'Неотслеживаемые') selected="selected" @endif>Неотслеживаемые</option>
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>



            <div class="form-group col-md-3 col-sm-2">
                <label for="type">Тип сотрудничества</label>
                @if ($errors->has('type'))
                    <div style="color: red">{{($errors->first('type'))}}</div>
                @endif
                <div>
                    <select class="form-control" name="type">
                        <option selected disabled @if (old('type') == '') selected="selected" @endif>Выберите тип сотрудничества</option>
                        <option value="Трудоустройство" @if (old('type') == 'Трудоустройство') selected="selected" @endif>Трудоустройство</option>
                        <option value="Информационное" @if (old('type') == 'Информационное') selected="selected" @endif>Информационное</option>
                        <option value="партнерство" @if (old('type') == 'партнерство') selected="selected" @endif>партнерство</option>
                        <option value="Проведение мероприятий" @if (old('type') == 'Проведение мероприятий') selected="selected" @endif>Проведение мероприятий</option>
                        <option value="Отсутствует" @if (old('type') == 'Отсутствует') selected="selected" @endif>Отсутствует</option>
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <p><label>Стэк технологий</label></p>
        @if ($errors->has('*.stack_id'))
            <div style="color: red">{{($errors->first('*.stack_id'))}}</div>
        @endif
        <div class="row">
            <div class="form-group col-md-2 col-sm-3">
                <label for="stack1">Стэк 1</label>
                <div>
                    <select class="form-control" id="stacks1" name="stacks[0][stack_id]">
                        <option selected disabled>Выберите стэк</option>
                    </select>
                </div>
                <p>Комментарий к стэк-технологии</p>
                <p><input class="form-control" name="stacks[0][stack_comment]" value="{{old('stacks.0.stack_comment')}}"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="stack1">Стэк 2</label>
                <div>
                    <select class="form-control" id="stacks2" name="stacks[1][stack_id]">
                        <option selected disabled>Выберите стэк</option>
                    </select>
                </div>
                <p>Комментарий к стэк-технологии</p>
                <p><input class="form-control" name="stacks[1][stack_comment]" value="{{old('stacks.1.stack_comment')}}"></p>
                <p class="help-block">*не обязательное поле</p>
                <p class="help-block">*double click to reset stack select</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="stack1">Стэк 3</label>
                <div>
                    <select class="form-control" id="stacks3" name="stacks[2][stack_id]">
                        <option selected disabled>Выберите стэк</option>
                    </select>
                </div>
                <p>Комментарий к стэк-технологии</p>
                <p><input class="form-control" name="stacks[2][stack_comment]" value="{{old('stacks.2.stack_comment')}}"></p>
                <p class="help-block">*не обязательное поле</p>
                <p class="help-block">*double click to reset stack select</p>
            </div>
        </div>
        <script src="/js/run2.js"></script>
        <div><input type="submit" value="Add new company"></div>
    </form>
</div>
@extends('layouts.footer')
