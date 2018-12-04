@extends('layouts.nav')
@section('title', 'Add Employee')
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<div class="container-fluid">
    <form action="{{Route('add.employee')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h4 class="name_table">Добавление нового сотрудника</h4>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО сотрудника</label>
                @if ($errors->has('name'))
                    <div class="error">{{($errors->first('name'))}}</div>
                @endif
                <input class="form-control" name="name" value="{{old('name')}}" placeholder="ФИО сотрудника">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес сотрудника</label>
                @if ($errors->has('address'))
                    <div class="error">{{($errors->first('address'))}}</div>
                @endif
                <input class="form-control" name="address" value="{{old('address')}}" placeholder="Адрес сотрудника">
                <p class="help-block">*обязательное поле</p>
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
                @if ($errors->has('skill_id'))
                    <div class="error">{{($errors->first('skill_id'))}}</div>
                @endif
                <select class="form-control" id="skills" size="4" name="skill_id[]" multiple>
                    <option selected value="">Отсутствует</option>
                    @foreach($skills as $skill)
                        <option value="{{$skill->id}}">{{$skill->skill_name}}</option>
                    @endforeach
                </select>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <p><label>Контакты</label></p>
        @if ($errors->has('*.contact'))
            <div class="error">{{($errors->first('*.contact'))}}</div>
        @endif
        <div class="row">
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Мобильный 1</label>
                <input hidden name="contacts[0][communication_tool]" value="mob1">
                <p><input class="form-control" placeholder="Номер формате +380ХХХХХХХХХ" type="tel" {{--pattern="/^\+380\d{3}\d{2}\d{2}\d{2}$/"--}} maxlength="13" name="contacts[0][contact]" value="{{old('contacts.0.contact')}}"></p>
                <p><input class="form-control" placeholder="Комментарий" name="contacts[0][comment]" value="{{old('contacts.0.comment')}}"></p>
                <p class="help-block">*не обязательное поле</p>
                <p class="help-block">*used for SMS sending</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Мобильный 2</label>
                <input hidden name="contacts[1][communication_tool]" value="mob2">
                <p><input class="form-control" placeholder="Номер формате +380ХХХХХХХХХ" type="tel" maxlength="13" name="contacts[1][contact]" value="{{old('contacts.1.contact')}}"></p>
                <p><input class="form-control" placeholder="Комментарий" name="contacts[1][comment]" value="{{old('contacts.1.comment')}}"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Электронная почта</label>
                <input hidden name="contacts[2][communication_tool]" value="email">
                <p><input class="form-control" placeholder="Введите email" type="email" name="contacts[2][contact]" value="{{old('contacts.2.contact')}}"></p>
                <p><input class="form-control" placeholder="Комментарий" name="contacts[2][comment]" value="{{old('contacts.2.comment')}}"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Скайп</label>
                <input hidden name="contacts[3][communication_tool]" value="skype">
                <p><input class="form-control" placeholder="Skype login" name="contacts[3][contact]" value="{{old('contacts.3.contact')}}"></p>
                <p><input class="form-control" placeholder="Комментарий" name="contacts[3][comment]" value="{{old('contacts.3.comment')}}"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-3">
                <label for="communication_tool">Другое</label>
                <input hidden name="contacts[4][communication_tool]" value="Other">
                <p><input class="form-control" placeholder="Контакт" name="contacts[4][contact]" value="{{old('contacts.4.contact')}}"></p>
                <p><input class="form-control" placeholder="Комментарий" name="contacts[4][comment]" value="{{old('contacts.4.comment')}}"></p>
                <p class="help-block">*не обязательное поле</p>
            </div>
        </div>
        <div><input class=" button btn-info" type="submit" value="Добавить нового сотрудника"></div>
        {{--<script src="/js/selectors.js"></script>--}}
    </form>
</div>


@extends('layouts.footer')
