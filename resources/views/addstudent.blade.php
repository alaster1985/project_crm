@extends('layouts.nav')
@section('title', 'Add Student')
<div class="container-fluid">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{Route('add.student')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Добавление нового студента</p>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="person_name">ФИО студента</label>
                @if ($errors->has('name'))
                    <div class="error">{{($errors->first('name'))}}</div>
                @endif
                <input class="form-control" name="name" value="{{old('name')}}" placeholder="ФИО студента">
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group  col-md-3 col-sm-2">
                <label for="person_address">Адрес студента</label>
                @if ($errors->has('address'))
                    <div class="error">{{($errors->first('address'))}}</div>
                @endif
                <input class="form-control" name="address" value="{{old('address')}}" placeholder="Адрес студента">
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="groups">Группа</label>
                @if ($errors->has('group_id'))
                    <div class="error">{{($errors->first('group_id'))}}</div>
                @endif
                <div>
                    <select required id="groups" name="group_id" class="form-control">
                        <option selected disabled>Выберите группу</option>
                        @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->group_name}}</option>
                        @endforeach
                    </select>
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
                        <option selected value="learning" @if (old('learning_status') == 'learning') selected="selected" @endif>learning</option>
                        <option value="graduated" @if (old('learning_status') == 'graduated') selected="selected" @endif>graduated</option>
                        <option value="fell_of" @if (old('learning_status') == 'fell_of') selected="selected" @endif>fell_of</option>
                        <option value="Other" @if (old('learning_status') == 'Other') selected="selected" @endif>Other</option>
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
                <select class="form-control" id="skills" size="4" name="skill_id[]" multiple>
                    <option selected disabled>Отсутствует</option>
                    @foreach($skills as $skill)
                        <option value="{{$skill->id}}">{{$skill->skill_name}}</option>
                    @endforeach
                </select>
                <p class="help-block">*не обязательное поле</p>
                <p class="help-block">*выбор нескольких значений через 'ctrl'</p>
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
                        <option value="employed" @if (old('employment_status') == 'employed') selected="selected" @endif>employed</option>
                        <option value="in_search" @if (old('employment_status') == 'in_search') selected="selected" @endif>in_search</option>
                        <option value="not_relevant_in_IT" @if (old('employment_status') == 'not_relevant_in_IT') selected="selected" @endif>not_relevant_in_IT</option>
                        <option value="refused" @if (old('employment_status') == 'refused') selected="selected" @endif>refused</option>
                        <option value="in_IT_not_in_direction" @if (old('employment_status') == 'in_IT_not_in_direction') selected="selected" @endif>in_IT_not_in_direction</option>
                        <option value="Other" @if (old('employment_status') == 'Other') selected="selected" @endif>Other</option>
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
        <div><input type="submit" value="Add new student"></div>
    </form>
</div>

@extends('layouts.footer')
