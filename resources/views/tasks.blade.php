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
                <button  class="btn btn-link btn-sm">Все</button>
                <button  class="btn btn-link btn-sm">Входящие</button>
                <button  class="btn btn-link btn-sm">Исходящие</button>
                <button class="btn btn-warning" onclick="window.location='{{ route("addtask")}}'">блок для кнопок добавления задания и тд
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


{{--  <table id="tableTasks" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
              </tr>--}}

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
{{--

   @foreach ($doer as $index)
       <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->name}}</a>
       <br>
   @endforeach
   @foreach($all_tasks as $index)
       <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->doers_report}}</a>
       <a href="{{route('tasks.view', ['id' => $index->id] )}}">{{$index->task_completed}}</a>
       <br>
   @endforeach
</ul>
--}}
<script src="/js/run.js"></script>
<script src="/js/tasks.js"></script>

@extends('layouts.footer')
