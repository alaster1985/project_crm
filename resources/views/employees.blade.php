@extends('layouts.nav')
@section('title', 'Сотрудники A-Level')
@csrf
<meta name="csrf-token" content="{{ csrf_token() }}"/>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
<div class="container-fluid">
    <div class="col-md-2 col-sm-4 ">
        <div>
            <label for="groups">Должность сотрудника</label>
            <div>
                <select class="form-control" id="position_it" name="position_id">
                    <OPTION SELECTED VALUE="0" disabled>Выберите должность</OPTION>
                </select>
            </div>
        </div>
        <div>
            <label for="groups">Направление в IT</label>
            <div>
                <select class="form-control" id="direction_it" name="direction_it">
                    <OPTION SELECTED VALUE="0" disabled>Выберите направление</option>
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
                <button class="btn btn-info" id="resetemployees"><i
                            class='glyphicon glyphicon-refresh' title="Reset"> </i>
                </button>
            </div>
        </div>
        <div id="stres" class="table_scroll">
            <table id="employeeTable" class="table {{--table-striped--}} table-bordered table-hover table-sm">
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
                </tbody>
            </table>
        </div>
        <div class="col-md-2 col-sm-6 ">
        </div>
    </div>
    <div class="col-md-2 col-sm-2">
        <div>
            <input class="form-control" type="hidden" name="ASPT" value="0"/>
            <label><input type="checkbox" id="chkbox" name="ASPT" value="1"/> Кандидат? </label>
        </div>
    </div>
</div>
@extends('layouts.footer')

<script src="/js/run.js"></script>
<script src="/js/employeestable.js"></script>

