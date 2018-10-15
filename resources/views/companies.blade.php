@extends('layouts.nav')
@section('title', 'Компании')
<div class="container-fluid">
    <div class="col-md-2 col-sm-6 ">
        <form action="{{Route('addcomp')}}">
            <input type="submit" value="Add new company">
        </form>
    </div>
    <div class="col-md-8 col-sm-6 ">
        <h4> Список компаний </h4>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Название
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Статус
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Тип
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Сайт
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Адрес
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Логотип
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Коментарий
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
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
    <div class="col-md-2 col-sm-6 ">
    </div>
</div>
@extends('layouts.footer')
