@extends('layouts.nav')
@section('title', 'Сотрудники A-Level')

<div class="container-fluid">
    <div class="col-md-2 col-sm-4 ">
        <div>
            <label for="groups">Должность сотрудника</label>
            <div>
                <select class="form-control" id="position" name="position_id">
                    <option selected>Выберите должность</option>
                </select>
            </div>
        </div>
        <div>
            <label for="groups">Направление в IT</label>
            <div>
                <select class="form-control" id="direction" name="direction_id">
                    <option selected>Выберите направление</option>
                </select>
            </div>
        </div>

    </div>

    <div class="col-md-8 col-sm-6 table-responsive">
        <div class="row">
            <div class="col-md-9 col-sm-8"><h4 class="name_table">Список сотрудников </h4></div>
            <div class="col-md-3 col-sm-4 table_bth">
                <button class="btn btn-warning" onclick="window.location='{{ route("addempl")}}'"><i
                            class='glyphicon glyphicon-user' title="Добавить нового сотрудника"></i>
                </button>
                <button class="btn btn-info" onclick="window.location='{{ route("addempl")}}'"><i
                            class='glyphicon glyphicon-comment' title="Отправить СМС"></i>
                </button>
                <button class="btn btn-info" onclick="window.location='{{ route("addempl")}}'"><i
                            class='glyphicon glyphicon-envelope' title="Отправить E-mail"></i>
                </button>
            </div>
        </div>
        <div id="stres" class="table_scroll">
            <table id="myTable" class="table {{--table-striped--}} table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th class="col-xs-3 head" style="position: sticky;top: 0;background: white;">ФИО
                    </th>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">Должность
                    </th>
                    <th class="col-xs-1 head" style="position: sticky;top: 0;background: white;">Направление
                    </th>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">IT компания
                    </th>
                    <th class="col-xs-1 head" style="position: sticky;top: 0;background: white;">Кандидат
                    </th>
                    <th class="col-xs-3 head" style="position: sticky;top: 0;background: white;">Комментарий
                    </th>
                </tr>
                </thead>
                <tbody>
                {{--  @if ($all_employees)
                      @foreach ($all_employees as $index)
                          <tr>
                              <td>
                                  <a href="{{route('employee.view', ['id' => $index->id] )}}">{{$index->name}}</a>
                              </td>
                              <td>
                                  <a href="{{route('employee.view', ['id' => $index->id] )}}">{{$index->position}}</a>
                              </td>
                              <td>
                                  <a href="{{route('employee.view', ['id' => $index->id] )}}">{{$index->direction}}</a>
                              </td>
                              <td>
                                  <a href="{{route('employee.view', ['id' => $index->id] )}}">{{$index->company_name}}</a>
                              </td>
                              <td>
                                  <a href="{{route('employee.view', ['id' => $index->id] )}}">{{$index->ASPT}}</a>
                              </td>
                              <td>
                                  <a href="{{route('employee.view', ['id' => $index->id] )}}">{{$index->alevelcomment}}</a>
                              </td>
                          </tr>
                      @endforeach
                      {{ $all_employees->links() }}
                  @endif--}}
                </tbody>
            </table>
        </div>
        <div class="col-md-2 col-sm-6 ">
        </div>
    </div>
    <div class="col-md-2 col-sm-2">
        <div>
            <label for="skills">Скилл</label>
            <select class="form-control" id="skills" size="4" name="skill_id[]" multiple>
                <option selected value="">Отсутствует</option>
            </select>
            <p class="help-block">*нажмите Ctrl для множественного выбора</p>
        </div>
        <div>
            <input class="form-control" type="hidden" name="ASPT" value="0"/>
            <label><input type="checkbox" name="ASPT" value="1"/> Кандидат? </label>
        </div>
    </div>
    <script src="/js/run2.js"></script>
</div>
@extends('layouts.footer')
