@extends('layouts.nav')
@section('title', 'Информация о студенте')
@csrf

<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>




{{--    <div id="imga">
        <img src="/images/image.jpg" alt="текст" id="pic"/>
    </div>
    <div>
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>
    </div>
    <div>
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>
    </div>--}}



{{--    <h2>Отправка Сообщений </h2>
    <form action="{{Route('sendSMS')}}" method="post">
        @csrf
        Введите сообщение:<br>
        <textarea placeholder="Message" name="msg"></textarea><br>
--}}{{--
        <input type="hidden" name="id" value="{{$id}}">
--}}{{--
        <input type="submit" value="Отправить">
    </form>--}}

    {{--<a>{{$student->name}}</a>
    <br>
    <a>{{$student->address}}</a>
    <br>
    <a>
        @foreach($contact as $index)
            {{$index->communication_tool}}
            <br>
            {{$index->contact}}
            <br>
            {{$index->comment}}
            <br>
        @endforeach
    </a>
    <a>
        @foreach($group as $index)
            {{$index->group_name}}
            <br>
            {{$index->learning_status}}
            <br>
            {{$index->employment_status}}
            <br>
        @endforeach
    </a>
    <a>{{$student->CV}}</a>
    </br>
    <a>
        @foreach($skill as $index)
            {{$index->skill_name}}
        @endforeach
    </a>
    <br>
    <a>
        @foreach($group as $index)
            {{$index->direction}}
            <br>
            {{$index->start_date}}
            <br>
            {{$index->finish_date}}
            <br>
            {{$index->homecoming_date}}
            <br>
        @endforeach
    </a>
    <a>
        {{$student->company_name}}
        <br>
        {{$student->position}}
        <br>
    </a>
    <a>
        @foreach($company as $index)
            {{$index->stack_name}}
            <br>
        @endforeach
    </a>
    <a>
       {{ $student->comment }}
    </a>
    <!--<FORM name="myForm">-->
    <select id="direction" name="direction">
        <!--    <option value="Albania">Albania</option> -->
    </select>
    <!--</FORM>
    <FORM name="mycity">-->
    <select id="groups" name="groups">
        <!--   <option value="Albania">Albania</option>-->
    </select>
    <!--</FORM>-->
    <div id="ext">
    </div>--}}

    {{------------------------------------------}}


{{--<div class="col-md-2 col-sm-6 ">--}}




<div class="col-md-2 col-sm-6 ">
    <select class="names-select2"></select>
    <style>
        select {
            width: 200px; /* Ширина списка в пикселах */
        }
    </style>
</div>

<div class="col-md-4 col-sm-10">
    <div  id="studParam">
    </div>
    <div id="findResult">
    </div>
<div class="col-md-2 col-sm-6" id="studgroups" ></div>
<div class="col-md-2 col-sm-6" id="studlearning" ></div>
<div class="col-md-2 col-sm-6" id="studemployment" ></div>

<script src="/js/run.js"></script>
<script src="/js/search.js"></script>
<script src="/js/studentSelectGroupDirection.js"></script>
<script src="/js/viewEditPersonalInformation.js"></script>


