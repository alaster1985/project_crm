@extends('layouts.nav')
@section('title', 'Информация о сотруднике')
@csrf
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?Php
$id = explode('/', $_SERVER["REQUEST_URI"])[count(explode('/', $_SERVER["REQUEST_URI"]))-1];
?>
<button class="btn btn-warning" onclick="window.location='{{ route("add_cur_stud", [$id])}}'"><i
        class='glyphicon glyphicon-user' title="Записать в студенты"> </i>
</button>



<div class="container-fluid personal_page">
    <div class="row ">
        <h4 class="name_table"> Персональная страница сотрудника</h4>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="headers_PP">Персональная информация.</div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">ФИО сотрудника:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="name_emploee"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Адрес сотрудника:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="address_emploee"></div>
            </br></br></br>
        </div>

        <div class="headers_PP">Контактная информация.</div>
        <div id ='contactInfo'>

        </div>
        <div class="headers_PP">Информация о занятости.</div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Напрвление:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="direction_emploee"></div>
            </br>
        </div>
        <div>
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Скиллы:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="skills_emploee"></div>
        <br><br>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Кандидат:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="ASPT"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Комментарий:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="comment_emploee"></div>
        </div>

    </div>
    <div class="col-md-6 col-xs-12">
        <div class="headers_PP">Опыт работы:</div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Место работы:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="it_company_emploee"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Позиция:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="position_emploee"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Стэк:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="stack_emploee"></div>
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
<script src="/js/run.js"></script>
<script src="/js/viewEdit/viewEditEmployee.js"></script>

@extends('layouts.footer')
