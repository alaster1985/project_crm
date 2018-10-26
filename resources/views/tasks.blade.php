@extends('layouts.nav')
@section('title', 'Задачи')
<div>
    <h4 class="name_table"> Список заданий </h4>
    <table id="tableTasks" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Задача
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Описание
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Дедлайн
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Заказчик
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Исполнитель
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Отчет
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Выполнено
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        </tr>
        </thead>
        <tbody>
        @if ($all_tasks)
            @foreach ($all_tasks as $index)
                <tr>
                    <td>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->task_name}}</a>
                    </td>
                    <td>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->description}}</a>
                    </td>
                    <td>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->dead_line}}</a>
                    </td>
                    <td>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->customerName}}</a>
                    </td>
                    @endforeach
                    {{ $all_tasks->links() }}
                    @endif
                    @foreach ($doer as $index)
                        <td>
                            <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->name}}</a>
                        </td>
                    @endforeach
                    @foreach($all_tasks as $index)
                        <td>
                            <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->doers_report}}</a>
                        </td>
                        <td>
                            <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->task_completed}}</a>
                        </td>
                    @endforeach
                </tr>

    {{--  <ul>--}}
    {{-- @if ($all_tasks)
         @foreach ($all_tasks as $index)
             <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->task_name}}</a>
             <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->description}}</a>
             <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->dead_line}}</a>
             <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->customerName}}</a>
             <br>
         @endforeach
         {{ $all_tasks->links() }}
     @endif--}}

    {{--   @foreach ($doer as $index)
           <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->name}}</a>
           <br>
       @endforeach
       @foreach($all_tasks as $index)
           <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->doers_report}}</a>
           <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->task_completed}}</a>
           <br>
       @endforeach
   </ul>--}}
</div>


@extends('layouts.footer')