@extends('layouts.nav')
@section('title', 'Задачи')
<div>

    <ul>
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
    </ul>
</div>


@extends('layouts.footer')