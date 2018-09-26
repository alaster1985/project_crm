<form action="{{Route('add.group')}}" method="post" enctype="multipart/form-data">
    @csrf
    <p>Добавление новой группы</p>
    <p>Название группы</p>
    <p><input name="group_name"></p>
    <p>Дата старта</p>
    <p><input name="start_date"></p>
    <p>Дата окончиная</p>
    <p><input name="finish_date"></p>
    <p>Дата защиты</p>
    <p><input name="homecoming_date"></p>
    <p>Направление</p>
    <p><input name="direction_id"></p>

    </br>
    <input type="submit" value="Add new group">
</form>
</br>
</br>

<div>
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