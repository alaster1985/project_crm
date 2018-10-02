@extends('layouts.nav')
@section('title', 'Информация о компании')

<link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>

<div>

<a>{{$taskView->task_name}} : </a>
</br>
<a>{{$taskView->description}} </a>
</br>
<a>{{$taskView->dead_line}} </a>
</br>
<a>{{$taskView->user_id_customer}} </a>
</br>
<a>{{$taskView->user_id_doer}} </a>
</br>

</div>