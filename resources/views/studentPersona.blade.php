@extends('layouts.nav')
@section('title', 'Информация о студенте')
@csrf

<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{--<button class="btn btn-warning" onclick="window.location='{{ route("add_cur_stud", [$id])}}'"><i
        class='glyphicon glyphicon-user' title="Записать в новую группу"> </i>
</button>--}}


<div class="container-fluid personal_page">
    <div class="row">
        <div class="col-md-11 col-sm-10 col-xs-12">
            <h4 class="name_table">Персональная страница студента </h4>
        </div>
        <div class="col-md-1 col-sm-8 col-xs-12">
            <div class="row">
                <button class="btn btn-info" onclick="window.location='{{ route("add_cur_emp", [$id])}}'"><i
                        class='glyphicon glyphicon-user' title="Записать в сотрудники"> </i>
                </button>
                <button class="btn btn-info" onclick="window.location='{{ route("add_cur_contp", [$id])}}'"><i
                        class='glyphicon glyphicon-user' title="Записать в контактные лица"> </i>
                </button>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="headers_PP">Персональная информация.</div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">ФИО студента:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="name_student"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Адрес студента:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="address_student"></div>
            </br></br>
        </div>

        <div class="headers_PP">Контактная информация.</div>
        <div id='contactInfo'>

        </div>
        <br>
        <br>

        <div class="headers_PP">Информация об обучении.</div>

        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Группа:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="group_student"></div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <button class="btn btn-link glyphicon glyphicon-plus"
                        onclick="window.location='{{ route("add_cur_stud", [$id])}}'">
                </button>
            </div>
            </br>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Напрвление:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="direction_student"></div>
            </br>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Статус обучения:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="learning_status_student"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Дата начала обучения:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="start_date_student"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Дата оканчания обучения:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="finish_date_student"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Дата защиты проекта:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="homecoming_date_student"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Скиллы:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="skills_student"></div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Комментарий о студенте:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="comment_student"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Резюме:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="rez_student"></div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="headers_PP">Информация о тудоустройстве.</div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Статус трудоустройства:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="employment_status_student"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Место работы:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="it_company_student"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Позиция:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="position_student"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Стэк:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="stack_student"></div>
            <br><br>
        </div>


        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <form action="{{Route('sendSMS')}}" method="post">
                    <div class="form-group">
                        @csrf
                        <textarea class="form-control" name="msg" rows="3"
                                  placeholder="Введите текст сообщения:"></textarea>
                    </div>
                    {{--{{$fone->contact}}--}}
                    <input type="hidden" name="contact" value="{{$fone->contact}}">
                    <button type="submit" class="btn btn-info">Отправить сообщение</button>
                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <form action="{{Route('sendMail')}}" method="post">
                    <div class="form-group">
                        @csrf
                        <textarea class="form-control" name="msg1" rows="3"
                                  placeholder="Введите текст письма:"></textarea>
                    </div>
                    <input type="hidden" name="mail" value="{{$mail->contact}}">
                    <button type="submit" class="btn btn-info">Отправить письмо</button>
                </form>
            </div>

        </div>

    </div>
</div>
@extends('layouts.footer')
<script src="/js/run.js"></script>

<script src="/js/viewEdit/viewEditPersonalInformation.js"></script>
{{--<script src="/js/table.js"></script>--}}
<script src="/js/table.js"></script>
<script src="/js/viewEditPersonalInformation.js"></script>



