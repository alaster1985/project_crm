@extends('layouts.nav')
@section('title', 'Информация о студенте')
@csrf

<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


{{--<div class="container-fluid ">
    <div class="col-md-2 col-sm-12 col-xs-4">
        <div id="studParam">
        </div>--}}
<div class="container-fluid personal_page">
    <div class="row ">
        <h4 class="name_table">Персональная страница студента </h4>
    </div>


    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="headers_PP">Персональная информация.</div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">ФИО студента:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="name_student">aaaaaaaaaaaa</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Адрес студента:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="address_student">asdad</div>
            </br></br>
        </div>

        <div class="headers_PP">Контактная информация.</div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Мобильный 1:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="mob1">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_mob1">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Мобильный 2:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="mob2">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_mob2">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Электронная почта:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="email_student">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_email_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Скайп:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="skype_student">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_skype_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Другое:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="other">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_other">asdad</div>
            </br></br>
        </div>
        <div class="headers_PP">Информация об обучении.</div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Группа:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="group_student">asdad</div>
            </br>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Напрвление:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="direction_student">asdad</div>
            </br>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Статус обучения:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="learning_status_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Дата начала обучения:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="start_date_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Дата оканчания обучения:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="finish_date_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Дата защиты проекта:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="homecoming_date_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Скиллы:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="skills_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Комментарий о студенте:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="comment_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Резюме:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="rez_student">asdad</div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="headers_PP">Информация о тудоустройстве.</div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Статус трудоустройства:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="employment_status_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Место работы:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="it_company_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Позиция:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="position_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Стэк:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="stack_student">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Направление:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="direction_student">asdad</div>
            </br></br>
        </div>

        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <form action="{{Route('sendSMS')}}" method="post">{{-- // указать путь к обработчику--}}
                    <div class="form-group">
                        @csrf
                    <textarea class="form-control" name="msg" rows="3"
                              placeholder="Введите текст сообщения:"></textarea>
                    </div>
                    <input type="hidden" name="contact" value="{{$fone->contact}}">
                    <button type="submit" class="btn btn-info">Отправить сообщение</button>
                </form>
            </div>
        </div>
    </div>
</div>


@extends('layouts.footer')
<script src="/js/run.js"></script>
<script src="/js/search.js"></script>
<script src="/js/studentSelectGroupDirection.js"></script>
<script src="/js/viewEditPersonalInformation.js"></script>


