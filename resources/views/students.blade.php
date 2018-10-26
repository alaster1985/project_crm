@extends('layouts.nav')
@section('title', 'Студенты A-Level')
@csrf
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

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
        <h4> Список студентов </h4>
        <table id="myTable" class="table table-striped table-bordered table-sm tablesorter">
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
        <div class="row"></div>
        <label for="learning_status">Статус обучения</label>
        <div>
            <select id ="learningstatus" class="form-control" name="learning_status">
                <OPTION SELECTED VALUE="0"></OPTION>
                <option value="learning">learning</option>
                <option value="graduated">graduated</option>
                <option value="fell_of">fell_of</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <label for="employment_status">Статус трудоустройства</label>
        <div>
            <select id ="employmentstatus" name="employment_status" class="form-control">
                <OPTION SELECTED VALUE="0"></OPTION>
                <option value="employed">employed</option>
                <option value="in_search">in_search</option>
                <option value="not_relevant_in_IT">not_relevant_in_IT</option>
                <option value="refused">refused</option>
                <option value="in_IT_not_in_direction">in_IT_not_in_direction</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <button type="button" onclick="window.location='{{ route("addstud")}}'">Добавить нового студента</button>
    </div>
</div>



    @extends('layouts.footer')

    <script src="/js/run.js"></script>
    {{--<script src="/js/studentSelectGroupDirection.js"></script>--}}
    <script src="/js/accordgroup.js"></script>
