@extends('layouts.nav')
@section('title', 'Студенты A-Level')
@csrf
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<div class="container-fluid personal_page">
    <div class="col-md-12 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h4 class="name_table">Персональная страница пользователя </h4>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12 parametr">Логин пользователя:</div>
                <div class="col-md-10 col-sm-10 col-xs-12" id="login_user"></div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12 parametr">Пароль:</div>
                <div type="hidden" class="col-md-10 col-sm-10 col-xs-12" id="Pass_user"></div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12 parametr">Электронная почта:</div>
                <div class="col-md-10 col-sm-10 col-xs-12" id="Mail_user"></div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.footer')
<script src="/js/run.js"></script>
<script src="/js/viewEdit/viewEditProfilePersona.js"></script>

