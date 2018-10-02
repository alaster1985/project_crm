@extends('layouts.nav')
@section('title', 'Группы A-Level')
<div class="container-fluid">
    <div class="col-md-2 col-sm-6 ">
<form action="{{Route('add.group')}}" method="post" enctype="multipart/form-data">
    @csrf
    <p>Добавление новой группы</p>
    <p>Название группы</p>
    <p><input name="group_name"></p>
    <p>Дата старта</p>
    <p><input type="date" class="form-control" placeholder="Дата" name="start_date" required></p>
    <p>Дата окончиная</p>
    <p><input type="date" class="form-control" placeholder="Дата" name="finish_date" required></p>
    <p>Дата защиты</p>
    <p><input type="date" class="form-control" placeholder="Дата" name="homecoming_date" required></p>
    <p>Направление</p>
    <p><input name="direction_id"></p>

    </br>
    <input type="submit" value="Add new group">
</form>
</br>
</br>
    </div>
    <div class="col-md-8 col-sm-6 ">
<ul>
    @if ($all_groups)
        @foreach ($all_groups as $index)
            <li>
                <a>{{$index->group_name}} : </a>
                <a href="{{route('group.view', ['id' => $index->id] )}}">View Group's page</a>
            </li>
        @endforeach
        {{ $all_groups->links() }}
    @endif
</ul>
</div>
@extends('layouts.footer')
</div>
<div class="col-md-2 col-sm-6 ">
</div>
</div>