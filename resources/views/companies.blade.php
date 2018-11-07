@extends('layouts.nav')
@section('title', 'Компании')
<div class="container-fluid">
    <div class="col-md-2 col-sm-6 ">
        <div>
            <label for="status">Статус взаимодействия</label>
            <div>
                <select class="form-control" name="status">
                    <OPTION SELECTED VALUE="0" disabled>Выберите статус</OPTION>
                    <option value="Партнеры">Партнеры</option>
                    <option value="Ведется диалог">Ведется диалог</option>
                    <option value="Потенциальные">Потенциальные</option>
                    <option value="Неотслеживаемые">Неотслеживаемые</option>
                </select>
            </div>
        </div>

        <div>
            <label for="type">Тип сотрудничества</label>
            <div>
                <select class="form-control" name="type">
                    <OPTION SELECTED VALUE="0" disabled>Выберите тип</OPTION>
                    <option value="Трудоустройство">Трудоустройство</option>
                    <option value="Информационное">Информационное</option>
                    <option value="партнерство">партнерство</option>
                    <option value="Проведение мероприятий">Проведение мероприятий</option>
                    <option value="Отсутствует">Отсутствует</option>
                </select>
            </div>
        </div>

    </div>

    <div class="col-md-8 col-sm-6 table-responsive">
        <div class="row">
            <div class="col-md-9 col-sm-8"><h4 class="name_table">Список компаний</h4></div>
            <div class="col-md-3 col-sm-4 table_bth">
                <button class="btn btn-warning" onclick="window.location='{{ route("addcomp")}}'"><i
                            class='glyphicon glyphicon-tower' title="Добавить новую компанию"></i>
                </button>
                <button class="btn btn-warning" onclick="window.location='{{ route("addcontper")}}'"><i
                            class='glyphicon glyphicon-user' title="Добавить контактное лицо"></i>
                </button>
            </div>
        </div>
        <div id="stres" class="table_scroll">
            <table id="myTable" class="table {{--table-striped--}} table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th class="col-xs-3 head" style="position: sticky;top: 0;background: white;">Название
                    </th>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">Статус
                    </th>
                    <th class="col-xs-1 head" style="position: sticky;top: 0;background: white;">Тип
                    </th>
                    <th class="col-xs-2 head" style="position: sticky;top: 0;background: white;">Сайт
                    </th>
                    <th class="col-xs-1 head" style="position: sticky;top: 0;background: white;">Адрес
                    </th>
                    <th class="col-xs-3 head" style="position: sticky;top: 0;background: white;">Логотип
                    </th>
                    <th class="col-xs-3 head" style="position: sticky;top: 0;background: white;">Комментарий
                    </th>
                </tr>
                </thead>
                <tbody>
                @if ($all_companies)
                    @foreach ($all_companies as $index)
                        <tr>
                            <td>
                                <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->company_name}}</a>
                            </td>
                            <td>
                                <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->status}}</a>
                            </td>
                            <td>
                                <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->type}}</a>
                            </td>
                            <td>
                                <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->site}}</a>
                            </td>
                            <td>
                                <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->address}}</a>
                            </td>
                            <td>
                                <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->logo}}</a>
                            </td>
                            <td>
                                <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->comment}}</a>
                            </td>
                        </tr>
                    @endforeach
                    {{ $all_companies->links() }}
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 ">
        <div>
            <label for="stack_id">Стэк технологий</label>
            <div>
                <select class="form-control" id="stacks" name="stack_id">
                    <OPTION SELECTED VALUE="0" disabled>Выберите технологию</OPTION>
                </select>
            </div>
        </div>
    </div>
    <script src="/js/run2.js"></script>
</div>
@extends('layouts.footer')
