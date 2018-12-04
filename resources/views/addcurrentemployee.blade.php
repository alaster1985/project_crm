@extends('layouts.nav')
@section('title', 'Add Employee')
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<div class="container-fluid">
    <form action="{{Route('add.add_cur_emp', [$person])}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Добавление нового сотрудника</p>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО сотрудника</label>
                <h3>{{$name}}</h3>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес сотрудника</label>
                <h3>{{$address}}</h3>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="positions">Должность сотрудника</label>
                @if ($errors->has('position_id'))
                    <div class="error">{{($errors->first('position_id'))}}</div>
                @endif
                <div>
                    <select class="form-control" id="position" name="position_id">
                        <option selected disabled>Выберите должность</option>
                        @foreach($positions as $position)
                            <option value="{{$position->id}}">{{$position->position}}</option>
                        @endforeach
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-2 col-sm-2">
                <label for="directions">Направление в IT</label>
                @if ($errors->has('direction_id'))
                    <div class="error">{{($errors->first('direction_id'))}}</div>
                @endif
                <div>
                    <select class="form-control" id="direction" name="direction_id">
                        <option selected disabled>Выберите направление</option>
                        @foreach($directions as $direction)
                            <option value="{{$direction->id}}">{{$direction->direction}}</option>
                        @endforeach
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="groups">IT компания в которой работает</label>
                @if ($errors->has('company_id'))
                    <div class="error">{{($errors->first('company_id'))}}</div>
                @endif
                <div>
                    <select class="form-control" id="companies" name="company_id">
                        <option selected disabled>Выберите компанию</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                        @endforeach
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="employee_comment">Комментарий</label>
                <input class="form-control" name="employee_comment" value="{{old('employee_comment')}}" placeholder="Комментарий">
                <p class="help-block">*не обязательное поле</p>
            </div>

            <div class="form-group col-md-3 col-sm-2">
                <label for="skills">Скилл</label>
                <h3>{{$skills}}</h3>
            </div>
        </div>
        <p><label>Контакты</label></p>
        <div class="row">
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Мобильный 1</label>
                <p>Номер телефона</p>
                <h3>{{$mob1_contact}}</h3>
                <p>Коментарий</p>
                <h3>{{$mob1_comment}}</h3>
                <p class="help-block">*used for SMS sending</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Мобильный 2</label>
                <p>Номер телефона</p>
                <h3>{{$mob2_contact}}</h3>
                <p>Коментарий</p>
                <h3>{{$mob2_comment}}</h3>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Электронная почта</label>
                <p>мыло</p>
                <h3>{{$email_contact}}</h3>
                <p>Коментарий</p>
                <h3>{{$email_comment}}</h3>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Скайп</label>
                <p>Скайп</p>
                <h3>{{$skype_contact}}</h3>
                <p>Коментарий</p>
                <h3>{{$skype_comment}}</h3>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Другое</label>
                <p>Контакт</p>
                <h3>{{$other_contact}}</h3>
                <p>Коментарий</p>
                <h3>{{$other_comment}}</h3>
            </div>
        </div>
        <div><input type="submit" value="Добавить нового сотрудника"></div>
        <script src="/js/selectors.js"></script>
    </form>
</div>


@extends('layouts.footer')
