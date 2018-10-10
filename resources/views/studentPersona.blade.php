@extends('layouts.nav')
@section('title', 'Информация о студенте')
@csrf

<meta name="csrf-token" content="{{ csrf_token() }}"/>


<div class="col-md-3 col-sm-8 ">

    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>

    <div id="imga">
        <img src="/images/image.jpg" alt="текст" id="pic"/>
    </div>
    <a>{{$student->name}}</a>
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
    </div>

    {{------------------------------------------}}


</div>

<div class="col-md-2 col-sm-6 ">

    <input type="search" name="search" id="search" placeholder="Поиск по сайту">
    <div id="findResult">
    </div>


</div>
<div class="col-md-2 col-sm-6 ">
    <div  id="studParam">
    </div>

</div>

<div class="col-md-2 col-sm-6" id="studgroups" >

</div>

<script src="/js/run.js"></script>

