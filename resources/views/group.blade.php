@extends('layouts.nav')
@section('title', 'Информация о группе')
<div class="container-fluid">
    <div class="col-md-2 col-sm-6 ">
    </div>
    <div class="col-md-8 col-sm-6 ">

<a>{{$groupView->group_name}} : </a>
</br>
<a>{{$groupView->start_date}} </a>
</br>
<a>Название напровления! (использован "JOIN") : </a>
<a>{{$groupView->direction}} </a>
</br>
</br>
    </div>
    <div class="col-md-2 col-sm-6 ">
    </div>
</div>

