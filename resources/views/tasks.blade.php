@extends('layouts.nav')
@section('title', 'Задачи')
<div class="container-fluid">
    <div class="col-md-2 col-sm-6 ">
    </div>
    <div class="col-md-8 col-sm-6 ">
        <h4> Список задач </h4>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
                            <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->name}}</a>
                        </td>
                        <td>
                            <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->task_completed}}</a>
                        </td>
                        <td>
                            <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->task_completed}}</a>
                        </td>
                        <td>
                            <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->doers_report}}</a>
                        </td>
                    </tr>
                @endforeach
                {{ $all_tasks->links() }}
            @endif
            </tbody>
        </table>
      {{--  <ul>
            @if ($all_tasks)
                @foreach ($all_tasks as $index)
                    <li>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->task_name}}</a>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->description}}</a>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->dead_line}}</a>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->name}}</a>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->task_completed}}</a>
                        <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->doers_report}}</a>

                    </li>
                @endforeach
                {{ $all_tasks->links() }}
            @endif
        </ul>--}}
    </div>
    <div class="col-md-2 col-sm-6 ">
    </div>

</div>

@extends('layouts.footer')