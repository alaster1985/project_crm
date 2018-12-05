@extends('layouts.nav')
@section('title', 'Add Contact Person')
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<div class="container-fluid">
    <form action="{{Route('add.add_cur_contp', [$person])}}" method="post" enctype="multipart/form-data">
        @csrf
        <h4 class="name_table">Добавление нового контактного лица</h4>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО контактного лица</label>
                <h4>{{$name}}</h4>
            </div>

            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес контактного лица</label>
                <h4>{{$address}}</h4>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="contact_person_comment">Комментарий</label>
                <input class="form-control" name="contact_person_comment" value="{{old('contact_person_comment')}}">
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
        <div class="row">
            @if($mob1_contact)
                <div class="form-group col-md-2 col-sm-3">
                    <label for="communication_tool">Мобильный 1</label>
                    <h4>{{$mob1_contact}}</h4>
                    <p>Комментарий</p>
                    <h4>{{$mob1_comment}}</h4>
                    <p class="help-block">*used for SMS sending</p>
                </div>
            @endif
            @if ($mob2_contact)
                <div class="form-group col-md-2 col-sm-3">
                    <label for="communication_tool">Мобильный 2</label>
                    <h3>{{$mob2_contact}}</h3>
                    <p>Комментарий</p>
                    <h3>{{$mob2_comment}}</h3>
                </div>
            @endif
            @if($email_contact)
                <div class="form-group col-md-2 col-sm-3">
                    <label for="communication_tool">Электронная почта</label>
                    <h4>{{$email_contact}}</h4>
                    <p>Комментарий</p>
                    <h4>{{$email_comment}}</h4>
                </div>
            @endif
            @if($skype_contact)
                <div class="form-group col-md-2 col-sm-3">
                    <label for="communication_tool">Скайп</label>
                    <h3>{{$skype_contact}}</h3>
                    <p>Комментарий</p>
                    <h4>{{$skype_comment}}</h4>
                </div>
            @endif
            @if($other_contact)
                <div class="form-group col-md-2 col-sm-3">
                    <label for="communication_tool">Другое</label>
                    <h4>{{$other_contact}}</h4>
                    <p>Комментарий</p>
                    <h4>{{$other_comment}}</h4>
                </div>
            @endif
        </div>
        <div><input class=" button btn-info" type="submit" value="Add new contact person"></div>
        {{--<script src="/js/selectors.js"></script>--}}
    </form>
</div>
@extends('layouts.footer')
