@extends('layouts.nav')
@section('title', 'Задачи')
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<div class="container-fluid ">
    <div class="col-md-2 col-sm-4 col-xs-4">
        <div>
            <label for="statusTasks">Статус выполнения</label>
            <div>
                <select class="form-control" id="statexec" name="direction_it">
                    <OPTION SELECTED VALUE="0" disabled>Выберите статус</option>
                    <option value="in_work">В работе</option>
                    <option value="done">Выполнено</option>
                </select>
            </div>
        </div>
        {{--<div><input type="date"></div>--}}{{-- фильтр по дате?--}}
    </div>
    <div class="col-md-8 col-sm-6 col-xs-4 table-responsive">
        <div class="row">
            <div class="col-md-7 col-sm-8 col-xs-12">
                <h4 class="name_table">Список заданий</h4>
            </div>

            <div class="col-md-5 col-sm-4 col-xs-12 table_bth" >
                {{--<button id="allbut" class="btn btn-link btn-sm">Все</button>--}}
                <button id="inbut" class="btn btn-link btn-sm">Входящие</button>
                <button id="outbut" class="btn btn-link btn-sm">Исходящие</button>
                <button class="btn btn-warning" onclick="window.location='{{ route("addtask")}}'">
                    <i class='glyphicon glyphicon-list-alt' title="Добавить нового задание"></i>
                </button>
                <button class="btn btn-info" id="resettasks"><i
                            {{--добавить RESET--}}
                            class='glyphicon glyphicon-refresh' title="Reset"> </i>
                </button>
            </div>
        </div>
        <div id="tableTasks" class="table_scroll">
            <table id="tasksT" class="table table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th class="col-xs-4 head" style="position: sticky;top: 0;background: white;">Задача
                    </th>
                    <th class="col-xs-3 head" style="position: sticky;top: 0;background: white;">Описание
                    </th>
                    <th class="col-xs-1 head" style="position: sticky;top: 0;background: white;">Дедлайн
                    </th>
                    <th class="col-xs-1 head" style="position: sticky;top: 0;background: white;">Заказчик
                    </th>
                    <th class="col-xs-1 head" style="position: sticky;top: 0;background: white;">Исполнитель
                    </th>
                    <th class="col-xs-1 head" style="position: sticky;top: 0;background: white;">Отчет
                    </th>
                    <th class="col-xs-1 head" style="position: sticky;top: 0;background: white;">Выполнено
                    </th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script src="/js/run.js"></script>
<script src="/js/tasks.js"></script>

@extends('layouts.footer')
