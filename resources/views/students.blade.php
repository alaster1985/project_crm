@extends('layouts.nav')
@section('title', 'Студенты A-Level')
@csrf
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="container-fluid">
    <div class="col-md-2 col-sm-4 ">

        <div id="menu">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sideNavbar">
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="sideNavbar">




                <div class="panel-group" id="accordionmenu">



                    @forelse($directions as $direction)
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionmenu" href="#collapse{{$direction ->id}}">
                                        <span class="direct" id="{{$direction ->id}}">{{$direction ->direction}}</span>
                                    </a>
                                </h4>
                            </div>

                            <div id="collapse{{$direction ->id}}" class="panel-collapse collapse">
                                <ul class="list-group">
                                    @foreach($groups as $group)
                                        @if($direction->id == $group->direction_id)
                                            <p><button class="navlink" id="{{$group->group_name}}">{{$group->group_name}}</button></p>
                                            {{--<li><a href="" class="navlink" id="{{$group->group_name}}">{{$group->group_name}}</a></li>--}}
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    @empty
                    @endforelse

                </div>

            </div>
        </div>
    </div>
    <div id="stres" class="col-md-8 col-sm-6">
        {{--<h4> Список студентов </h4>--}}
        {{--<table id="tableStudents" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">--}}
        {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}
        {{--</th>--}}
        {{--<th class="th-sm">ФИО--}}
        {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}
        {{--</th>--}}
        {{--<th class="th-sm">Группа--}}
        {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}
        {{--</th>--}}
        {{--<th class="th-sm">Статус обучения--}}
        {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}
        {{--</th>--}}
        {{--<th class="th-sm">Статус трудоустройства--}}
        {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}
        {{--</th>--}}
        {{--<th class="th-sm">Комментарий--}}
        {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}
        {{--</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@if ($all_students)--}}
        {{--@foreach ($all_students as $index)--}}
        {{--<tr>--}}
        {{--<td>--}}
        {{--<a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->name}}</a>--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--<a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->group_name}}</a>--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--<a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->learning_status}}</a>--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--<a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->employment_status}}</a>--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--<a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->comment}}</a>--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
        {{--{{ $all_students->links() }}--}}
        {{--@endif--}}
        {{--</tbody>--}}
        {{--</table>--}}
    </div>

    <div class="col-md-2 col-sm-6 ">

        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <!-- Заголовок 1 панели -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Статус обучения</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <!-- Содержимое 1 панели -->
                    <div class="panel-body">
                        @foreach ($learning_status as $status)
                            <li><a class="dropdown-item" href="#"> {{$status->learning_status}}</a></li>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- 2 панель -->
            <div class="panel panel-default">
                <!-- Заголовок 2 панели -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Статус
                            трудоустройства</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <!-- Содержимое 2 панели -->
                    <div class="panel-body">
                        @foreach ($employment_status as $status)
                            <li><a class="dropdown-item" href="#"> {{$status->employment_status}}</a></li>
                        @endforeach
                    </div>
                </div>
            </div>gi
        </div>
        <button type="button" onclick="window.location='{{ route("addstud")}}'">Добавить нового студента</button>
    </div>
</div>
    @extends('layouts.footer')


    <script src="/js/run.js"></script>
    {{--<script src="/js/search.js"></script>--}}
    {{--<script src="/js/studentSelectGroupDirection.js"></script>--}}
    <script src="/js/accordgroup.js"></script>
{{--<script src="/js/viewEditPersonalInformation.js"></script>--}}
{{-- <script src="/js/show.js"></script>--}}