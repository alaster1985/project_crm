@extends('layouts.nav')
@section('title', 'Сотрудники A-Level')

<div class="container-fluid">
<div class="col-md-2 col-sm-6 ">

    <!-- form adding students to DB.
    Use data in php by
    $request->session()->keep(['name', 'email', 'site', 'text_area']);
    -->
    <form action="{{Route('addempl')}}">
        @csrf
        <input class="btn-block" type="submit" value="Add new employee">
    </form>
    <button class="btn-block"><a href="{{route('index')}}">На главную</a></button>
</div>


<div class="col-md-8 col-sm-6 ">
    <h4 class="name_table"> Список сотрудников </h4>
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">ФИО
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Должность
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Направление
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">IT компания
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Кандидат
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">Комментарий
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        </tr>
        </thead>
        <tbody>
        @if ($all_employees)
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
        @endif
        </tbody>
    </table>
</div>
    <div class="col-md-2 col-sm-6 ">
    </div>
</div>
@extends('layouts.footer')
