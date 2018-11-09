@extends('layouts.nav')
@section('title', 'Информация о группе')
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid personal_page">
    <div class="row ">
        <h4 class="name_table">Информация о группе.</h4>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Название:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="name_group">aaaaaaaaaaaa</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Дата начала обучения:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="start_date_group">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Дата оканчания обучения:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="finish_date_group">asdad</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Дата защиты проекта:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="homecoming_date_group">asdad</div>
        </div>
    </div>
</div>