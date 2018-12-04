@extends('layouts.nav')
@section('title', 'Информация о компании')

<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid personal_page">
    <div class="row ">
        <h4 class="name_table">Информация о задаче.</h4>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 parametr">Название задачи:</div>
            <div class="col-md-6 col-sm-12 col-xs-12" id="name_task"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Описание:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="description_task"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Срок выполнения:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="dead_line_task"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Заказчик:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="customer"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Исполнитель:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="doer"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Отчёт:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="report"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 parametr">Выполнено:</div>
            <div class="col-md-6 col-sm-6 col-xs-12" id="done"></div>
        </div>
    </div>
</div>
<script src="/js/run.js"></script>
<script src="/js/viewEdit/viewEditTasks.js"></script>