@extends('layouts.nav')
@section('title', 'Информация о сотруднике')
@csrf

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<meta name="csrf-token" content="{{ csrf_token() }}" />


<div class="col-md-3 col-sm-8 ">

<link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>

<div id="imga">
    <img src="/images/image.jpg" alt="текст" id="pic"/>
</div>
    {{--@foreach ($emploeeView as $em)--}}
    {{--<p>{{$em->id}}</p>--}}
    {{--@endforeach--}}
{{--<a>{{$emploeeView->name}} : </a>--}}
</br>


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

<div class="col-md-3 col-sm-8 ">

<input type="search" name="search" id="search" placeholder="Поиск по сайту">
    <div id="findResult">
    </div>

</div>

{{--<div class="col-md-2 col-sm-6 ">--}}
    {{--<div  id="studParam">--}}
    {{--</div>--}}

{{--</div>--}}

<script src="/js/run.js"></script>
