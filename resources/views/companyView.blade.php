@extends('layouts.nav')
@section('title', 'Информация о компании')

<link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>


<div id="imga">
    <img src="/images/image.jpg" alt="текст" id="pic"/>
</div>

<a>{{$companyView->company_name}} : </a>
</br>
<a>{{$companyView->status}} </a>
</br>
<a>{{$companyView->type}} </a>
</br>
<a>{{$companyView->site}} </a>
</br>
<a>{{$companyView->address}} </a>
</br>
<a>{{$companyView->logo}} </a>
</br>
<a>{{$companyView->comment}} </a>
</br>
<a>
    @foreach($stack as $index)
        {{$index->stack_name}}
        {{$index->comment}}
        <br>
    @endforeach
</a>
<a>
    @foreach($contact as $index)
        {{$index->name}}
        <br>
        {{$index->position}}
        <br>
        {{$index->direction}}
        <br>
        {{$index->comment}}
        <br>
    @endforeach
</a>

{{--Форма для загрузки изображений. Использовать можно в любом файле.
После загрузки возвращается на страницу, откуда вызвана--}}
<form action="{{Route('add.image')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="fileform">
        <div class="selectbutton">Выберите изображение</div>
        <input id="upload" type="file" name="image"/>
    </div>
    <input type="submit" value="Add image to company">
</form>
