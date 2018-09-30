@extends('layouts.nav')
@section('title', 'Информация о группе')

<a>{{$groupView->group_name}} : </a>
</br>
<a>{{$groupView->start_date}} </a>
</br>
<a>Название напровления! (использован "JOIN") : </a>
<a>{{$groupView->direction}} </a>
</br>
</br>
