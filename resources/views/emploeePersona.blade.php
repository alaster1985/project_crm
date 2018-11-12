@extends('layouts.nav')
@section('title', 'Информация о сотруднике')
@csrf
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid personal_page">
    <div class="row ">
        <h4 class="name_table"> Персональная страница сотрудника</h4>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="headers_PP">Персональная информация.</div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">ФИО сотрудника:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="name_emploee">aaaaaaaaaaaa</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Адрес сотрудника:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="address_emploee">asdad</div>
            </br></br></br>
        </div>

        <div class="headers_PP">Контактная информация.</div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Мобильный 1:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="mob1_emploee">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_mob1_emploee">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Мобильный 2:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="mob2_emploee">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_mob2_emploee">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Электронная почта:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="email_emploee">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_email_emploee">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Скайп:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="skype_emploee">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_skype_emploee">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Другое:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="other">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_other_emploee">asdad</div>
            </br></br></br>
        </div>
        <div class="headers_PP">Информация о занятости.</div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Напрвление:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="direction_emploee">asdad</div>
            </br>
        </div>
        <div>
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Скиллы:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="skills_emploee">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Кандидат:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="ASPT">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Комментарий:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="comment_emploee">asdad</div>
        </div>

    </div>
    <div class="col-md-6 col-xs-12">
        <div class="headers_PP">Опыт работы:</div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Место работы:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="it_company_emploee">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Позиция:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="position_emploee">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Стэк:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="stack_emploee">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Направление:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="direction_emploee">asdad</div>
            </br></br>
        </div>

        <div class="row">
            {{--  <div class="col-md-8 col-sm-12 col-xs-12">
                  <form action="{{Route('sendSMS')}}" method="post">
                      <div class="form-group">
                          @csrf
                          <textarea class="form-control" name="msg" rows="3"
                                    placeholder="Введите текст сообщения:"></textarea>
                      </div>
                      <input type="hidden" name="contact" value="{{$fone->contact}}">
                      <button type="submit" class="btn btn-info">Отправить сообщение</button>
                  </form>
              </div>--}}
        </div>
    </div>
</div>


@extends('layouts.footer')