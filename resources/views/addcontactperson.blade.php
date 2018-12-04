@extends('layouts.nav')
@section('title', 'Add Contact Person')
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<div class="container-fluid">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{Route('add.contactperson')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Добавление нового контактного лица</p>
        <div class="row">

            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО контактного лица</label>
                @if ($errors->has('name'))
                    <div style="color: red">{{($errors->first('name'))}}</div>
                @endif
                <input class="form-control" name="name" value="{{old('name')}}" placeholder="ФИО контактного лица">
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес контактного лица</label>
                @if ($errors->has('address'))
                    <div style="color: red">{{($errors->first('address'))}}</div>
                @endif
                <input class="form-control" name="address" value="{{old('address')}}" placeholder="Адрес контактного лица">
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="contact_person_comment">Комментарий</label>
                <input class="form-control" name="contact_person_comment" value="{{old('contact_person_comment')}}" >
                <p class="help-block">*не обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group  col-md-3 col-sm-3">
                <label for="direction">IT компания в которой работает</label>
                @if ($errors->has('company_id'))
                    <div style="color: red">{{($errors->first('company_id'))}}</div>
                @endif
                <select class="form-control" id="companies" name="company_id">
                    <option selected disabled>Выберите компанию</option>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->company_name}}</option>
                    @endforeach
                </select>
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group  col-md-3 col-sm-3">
                <label for="position">Должность контактного лица</label>
                @if ($errors->has('position_id'))
                    <div style="color: red">{{($errors->first('position_id'))}}</div>
                @endif
                <select class="form-control" id="position" name="position_id">
                    <option selected disabled>Выберите должность</option>
                    @foreach($positions as $position)
                        <option value="{{$position->id}}">{{$position->position}}</option>
                    @endforeach
                </select>
                <p class="help-block">*обязательное поле</p>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="direction">Направление в IT</label>
                @if ($errors->has('direction_id'))
                    <div style="color: red">{{($errors->first('direction_id'))}}</div>
                @endif
                <select class="form-control" id="direction" name="direction_id">
                    <option selected disabled>Выберите направление</option>
                    @foreach($directions as $direction)
                        <option value="{{$direction->id}}">{{$direction->direction}}</option>
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
        <div><input type="submit" value="Add new contact person"></div>
        <script src="/js/selectors.js"></script>
    </form>
</div>
@extends('layouts.footer')
