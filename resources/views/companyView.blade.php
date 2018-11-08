@extends('layouts.nav')
@section('title', 'Информация о компании')
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid personal_page">
    <div class="row ">
        <h4 class="name_table">Информация о компании.</h4>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="imga">
            <img src="/images/app.jpg" alt="Логотип компании" id="pic"/>
        </div>
        <div class="headers_PP">Общая информация.</div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Название:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="name_company">aaaaaaaaaaaa</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Адрес компании:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="address_company">asdad</div>
            </br></br>
        </div>
        <div class="headers_PP">Спецификация.</div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 parametr">Стэк:</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="stack_company">asdad</div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="comment_company">asdad</div>

        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="headers_PP">Информация о контактных лицах.</div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">ФИО сотрудника:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="name_emploee_company">aaaaaaaaaaaa</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Позиция:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="position_emploee_company">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Направление:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="direction_emploee_company">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Комментарий:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="comment_emploee_company">asdad</div>
        </div>
    </div>
</div>

@extends('layouts.footer')