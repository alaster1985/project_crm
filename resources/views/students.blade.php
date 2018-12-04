@extends('layouts.nav')
@section('title', 'Студенты A-Level')
@csrf
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<div class="container-fluid ">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="col-md-2 col-sm-4 col-xs-4">

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
                                    <a data-toggle="collapse" data-parent="#accordionmenu"
                                       href="#collapse{{$direction ->id}}">
                                            <span class="direct"
                                                  id="{{$direction ->id}}">{{$direction ->direction}}</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$direction ->id}}" class="panel-collapse collapse">
                                <ul class="list-group">
                                    @foreach($groups as $group)
                                        @if($direction->id == $group->direction_id)
                                            <li class="list-group-item"><a href="#" class="navlink"
                                                                           id="{{$group->group_name}}">{{$group->group_name}}</a>
                                            </li>
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
    <div class="col-md-8 col-sm-6 col-xs-4 table-responsive">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-6">
                <h4 class="name_table"> Список студентов </h4>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 table_bth">
                <button class="btn btn-warning" onclick="window.location='{{ route("addstud")}}'"><i
                            class='glyphicon glyphicon-user' title="Добавить нового студента"> </i>
                </button>
                <button id="smsstud" class="btn btn-info" onclick="window.location='{{ route("rassilka")}}'"><i
                            class='glyphicon glyphicon-comment' title="Отправить СМС"></i>
                </button>
                <button id="emailstud" class="btn btn-info" onclick="window.location='{{ route("addstud")}}'"><i
                            class='glyphicon glyphicon-envelope' title="Отправить E-mail"> </i>
                </button>
                <button class="btn btn-info" id="resetstudents"><i
                            class='glyphicon glyphicon-refresh' title="Reset"> </i>
                </button>
            </div>
        </div>
        <div id="stres" class="table_scroll">
            <table id="myTable" class="table table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">ФИО
                    </th>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">Группа
                    </th>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">Направление
                    </th>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">Статус обучения
                    </th>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">Статус трудоустройства
                    </th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
        <div>
            <form action="{{Route('rassilka')}}" method="post">
                @csrf
                Введите сообщение:<br>
                <textarea id="msgfield" placeholder="Message" name="msg"></textarea><br>
            </form>
        </div>
    <div class="col-md-2 col-sm-2 col-xs-4">
        <div class="row"></div>
        <label for="learning_status">Статус обучения</label>
        <div>
            <select id="learningstatus" class="form-control" name="learning_status">
                <OPTION SELECTED VALUE="0" disabled>Выберите статус</OPTION>
                <option value="learning">learning</option>
                <option value="graduated">graduated</option>
                <option value="fell_of">fell_of</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <label for="employment_status">Статус трудоустройства</label>
        <div>
            <select id="employmentstatus" name="employment_status" class="form-control">
                <OPTION SELECTED VALUE="0" disabled>Выберите статус</OPTION>
                <option value="employed">employed</option>
                <option value="in_search">in_search</option>
                <option value="not_relevant_in_IT">not_relevant_in_IT</option>
                <option value="refused">refused</option>
                <option value="in_IT_not_in_direction">in_IT_not_in_direction</option>
                <option value="Other">Other</option>
            </select>
        </div>


        <div>
            <br/>
            <select class="names-select2"></select>
            <style>
                select {
                    width: 195px; /* Ширина списка в пикселах */
                }
            </style>
        </div>
        <div>
            <div id="studParam">
            </div>
            <br><br>
            <div>
                <div id="findResult">
                </div>
            </div>
        </div>
    </div>
</div>


@extends('layouts.footer')
{{--<script src="/js/reset.js"></script>--}}
<script src="/js/run.js"></script>
<script src="/js/search.js"></script>
<script src="/js/accordgroup.js"></script>
