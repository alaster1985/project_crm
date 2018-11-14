@extends('layouts.nav')
@section('title', 'Группы A-Level')
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<div class="container-fluid">
    <div class="col-md-2 col-sm-4 ">
        <div>
            <label for="groups">Направление в IT</label>
            <div>
                <select class="form-control" id="direction_it" name="direction_it">
                    <OPTION SELECTED VALUE="0" disabled>Выберите направление</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-6 col-xs-4 table-responsive">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-6"><h4 class="name_table"> Список групп А-левел</h4></div>
            <div class="col-md-3 col-sm-4 col-xs-6 table_bth">
                <button class="btn btn-warning"><a href="#openModal"><i
                                class='glyphicon glyphicon-user' title="Добавить новую группу"></i></a></button>
                <div id="openModal" class="modalDialog">
                    <div>
                        <a href="#close" title="Закрыть" class="close">X</a>
                        <form action="{{Route('add.group')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <p>Добавление новой группы</p>
                            <p>Название группы</p>
                            <p><input name="group_name"></p>
                            <p>Дата старта</p>
                            <p><input type="date" class="form-control" placeholder="Дата" name="start_date" required>
                            </p>
                            <p>Дата окончиная</p>
                            <p><input type="date" class="form-control" placeholder="Дата" name="finish_date" required>
                            </p>
                            <p>Дата защиты</p>
                            <p><input type="date" class="form-control" placeholder="Дата" name="homecoming_date"
                                      required>
                            </p>
                            <p>Направление</p>
                            <p>
                                <select class="form-control" id="direction" name="direction_it">
                                    <OPTION SELECTED VALUE="0" disabled>Выберите направление</option>
                                </select>
                            </p>
                            </br>
                            <script src="/js/run2.js"></script>
                            <input type="submit" value="Add new group">
                        </form>
                    </div>
                </div>
                <button id="resetalevel" class="btn btn-info" ><i
                            class='glyphicon glyphicon-refresh' title="Reset"> </i>
                </button>
            </div>
        </div>
        <div class="table_scroll">
            <table id="alevelTable" class="table table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">Группа
                    </th>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">Направление
                    </th>
                    <th class="col-xs-4 head" style="position: sticky;top: 0;background: white;">Дата начала
                        обучения
                    </th>
                    <th class="col-xs-4 head" style="position: sticky;top: 0;background: white;">Дата оканчания
                        обучения
                    </th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 ">
    </div>
    <ul>
        {{--@if ($all_groups)--}}
            {{--@foreach ($all_groups as $index)--}}
                {{--<li>--}}
                    {{--<a>{{$index->group_name}} : </a>--}}
                    {{--<a href="{{route('group.view', ['id' => $index->id] )}}">View Group's page</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
            {{--{{ $all_groups->links() }}--}}
        {{--@endif--}}
    </ul>
</div>
@extends('layouts.footer')
{{--<script src="/js/modal.js"></script>--}}
<script src="/js/run.js"></script>
<script src="/js/education.js"></script>

