@extends('layouts.nav')
@section('title', 'Add Student')
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<div>
<embed height="1" src="/js/123.mp3">
</div>
<div class="container-fluid">
    <form action="{{Route('add.add_cur_stud', [$person])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Записать текущего in группу</p>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО студента</label>
                <h3>{{$name}}</h3>
            </div>
            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес студента</label>
                <h3>{{$address}}</h3>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="groups">Группа</label>
                @if ($errors->has('group_id'))
                    <div class="error">{{($errors->first('group_id'))}}</div>
                @endif
                <div>
                    <select required id="group" name="group_id" class="form-control">
                        <option selected disabled>Выберите группу</option>
                        @foreach($groups as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    {{--<h3>{{$groups}}</h3>--}}
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label for="learning_status">Статус обучения</label>
                @if ($errors->has('learning_status'))
                    <div class="error">{{($errors->first('learning_status'))}}</div>
                @endif
                <div>
                    <select required class="form-control" name="learning_status">
                        <option selected value="learning"
                                @if (old('learning_status') == 'learning') selected="selected" @endif>learning
                        </option>
                        <option value="graduated"
                                @if (old('learning_status') == 'graduated') selected="selected" @endif>graduated
                        </option>
                        <option value="fell_of" @if (old('learning_status') == 'fell_of') selected="selected" @endif>
                            fell_of
                        </option>
                        <option value="Other" @if (old('learning_status') == 'Other') selected="selected" @endif>Other
                        </option>
                    </select>
                </div>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="student_comment">Комментарий</label>
                <input class="form-control" name="student_comment" value="{{old('student_comment')}}">
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="skill_id">Скилл</label>
                <h3>{{$skills}}</h3>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label for="rez">Резюме</label>
                @if ($errors->has('file'))
                    <div class="error">{{($errors->first('file'))}}</div>
                @endif
                <input type="file" name="file" accept="application/pdf" id="fileToUpload">
                <p class="help-block">*не обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="employment_status">Статус трудоустройства</label>
                <div>
                    <select name="employment_status" class="form-control">
                        <option selected value="">Выберите статус трудоустройства</option>
                        <option value="employed"
                                @if (old('employment_status') == 'employed') selected="selected" @endif>employed
                        </option>
                        <option value="in_search"
                                @if (old('employment_status') == 'in_search') selected="selected" @endif>in_search
                        </option>
                        <option value="not_relevant_in_IT"
                                @if (old('employment_status') == 'not_relevant_in_IT') selected="selected" @endif>
                            not_relevant_in_IT
                        </option>
                        <option value="refused" @if (old('employment_status') == 'refused') selected="selected" @endif>
                            refused
                        </option>
                        <option value="in_IT_not_in_direction"
                                @if (old('employment_status') == 'in_IT_not_in_direction') selected="selected" @endif>
                            in_IT_not_in_direction
                        </option>
                        <option value="Other" @if (old('employment_status') == 'Other') selected="selected" @endif>
                            Other
                        </option>
                    </select>
                    <p class="help-block">*не обязательное поле</p>
                </div>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label for="members">Ответственный HR</label>
                <div>
                    <select id="members" name="member_id" class="form-control">
                        <option selected value="">Выберите ответственного HR</option>
                        @foreach($members as $member)
                            <option value="{{$member['id']}}">{{$member['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="companies">IT компания</label>
                <div>
                    <select id="companies" name="company_id" class="form-control">
                        <option selected value="">Выберите компанию</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                        @endforeach
                    </select>
                </div>
                <p class="help-block">*не обязательное поле</p>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label for="position">Должность</label>
                <div>
                    <select id="position" name="position_id" class="form-control">
                        <option selected value="">Выберите должность</option>
                        @foreach($positions as $position)
                            <option value="{{$position->id}}">{{$position->position}}</option>
                        @endforeach
                    </select>
                </div>
                <p class="help-block">*не обязательное поле</p>
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
        <div><input type="submit" value="Add new student"></div>
        {{--<script src="/js/selectors.js"></script>--}}
    </form>
</div>

@extends('layouts.footer')
