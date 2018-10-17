@extends('layouts.nav')
@section('title', 'Add Components')
@csrf
{{--<form action="{{Route('add.component')}}" method="POST" enctype="multipart/form-data">--}}
    {{--@csrf--}}
    {{--<p>Добавление новых компонентов</p>--}}
    {{--<p>Добавить новый скилл</p>--}}
    {{--<p><input name="skill"></p>--}}
    {{--<p>Добавить новую должность</p>--}}
    {{--<p><input name="position"></p>--}}
    {{--<p>Добавить новый стэк</p>--}}
    {{--<p><input name="stack"></p>--}}
    {{--<p>Добавить новое направление</p>--}}
    {{--<p><input name="direction"></p>--}}
    {{--<input type="submit" value="Save">--}}
{{--</form>--}}

{{--<div class="container">--}}
    {{--<button type="submit" class="btn btn-default" data-toggle="modal" data-target="#myModal">Добавить нового--}}
        {{--студента--}}
    {{--</button>--}}

    {{--<!-- Modal -->--}}
    {{--<div class="modal fade" id="myModal" role="dialog">--}}
        {{--<div class="modal-dialog">--}}

            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<h4 class="modal-title">Добавление нового студента</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<form action="{{Route('add.student')}}" method="post" enctype="multipart/form-data">--}}
                        {{--@csrf--}}
                        {{--<p>Введите данные</p>--}}
                        {{--<p>Имя студента</p>--}}
                        {{--<p><input name="student_name"></p>--}}
                        {{--<input type="submit" value="Add new student">--}}
                    {{--</form>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


<table>
    <caption>Доступные компоненты</caption>
    <tr>
        <th>Скилл</th>
        <th>Стэк</th>
        <th>Должность</th>
        <th>Направление</th>
    </tr>
    <tr>
        <td>Строка2 Ячейка1</td>
        <td>Строка2 Ячейка2</td>
        <td>Строка2 Ячейка3</td>
        <td>Строка2 Ячейка4</td>
    </tr>
    <tr>
        <td>Строка3 Ячейка1</td>
        <td>Строка3 Ячейка2</td>
        <td>Строка3 Ячейка3</td>
        <td>Строка3 Ячейка4</td>
    </tr>
    <tr>
        <td>Строка4 Ячейка1</td>
        <td>Строка4 Ячейка2</td>
        <td>Строка4 Ячейка3</td>
        <td>Строка4 Ячейка4</td>
    </tr>
</table>

@extends('layouts.footer')
