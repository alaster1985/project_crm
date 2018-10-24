@extends('layouts.nav')
@section('title', 'Студенты A-Level')
@csrf
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

{{--<script type="text/javascript" src="/js/tablesort.js"></script>--}}
{{--<script type="text/javascript" src="/js/jquery-latest.js"></script>--}}
{{--<script type="text/javascript" src="/js/jquery.tablesorter.js"></script>--}}

</head>

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
                                            <li class="list-group-item"><a href="#" class="navlink" id="{{$group->group_name}}">{{$group->group_name}}</a></li>
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

        <table id="myTable" class="tablesorter">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Group</th>
                <th>Direction</th>
                <th>Learning Status</th>
                <th>Employment Status</th>

            </tr>
                </thead>
            <tbody>
            </tbody>
        </table>


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
            </div>
        </div>
        <button type="button" onclick="window.location='{{ route("addstud")}}'">Добавить нового студента</button>
    </div>
</div>



    @extends('layouts.footer')

    <script src="/js/run.js"></script>
    {{--<script src="/js/studentSelectGroupDirection.js"></script>--}}
    <script src="/js/accordgroup.js"></script>
