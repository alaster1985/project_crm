
@extends('layouts.nav')
@csrf
<div class="col-md-3 col-sm-8 ">

<link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>

<div id="imga">
    <img src="/images/image.jpg" alt="текст" id="pic"/>
</div>

<a>{{$emploeeView->name}} : </a>
</br>
<a>{{$emploeeView->contact}} </a>
</br>
<a>{{$emploeeView->communication_tool}} </a>
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

<div class="col-md-2 col-sm-6 ">

<input type="search" name="search" id="search" placeholder="Поиск по сайту">
    <div id="findResult">
    </div>


</div>
<script src="/js/run.js"></script>
