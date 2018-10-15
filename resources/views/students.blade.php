@extends('layouts.nav')
@section('title', 'Студенты A-Level')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container-fluid">
    <div class="col-md-2 col-sm-4 ">

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
                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordionmenu"
                                                           href="#collapse{{$direction ->id}}">
                                        <span>{{$direction ->direction}}</span></a>
                                </h4>
                            </div>
                            <div id="collapse{{$direction ->id}}" class="panel-collapse collapse">
                                <ul class="list-group">
                                    @foreach($groups as $group)
                                        @if($direction->id == $group->direction_id)
                                            <li><a href="" class="navlink">{{$group->group_name}}</a></li>
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
    <div id="q" class="col-md-8 col-sm-6 ">
        {{-- <div class="btn-group">
             <button id="learStatus" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                 Статус обучения <span class="caret"></span>
             </button>
             <ul class="dropdown-menu">
                 @foreach ($learning_status as $status)
                     <li><a class="dropdown-item" href="#"> {{$status->learning_status}}</a></li>
                 @endforeach
             </ul>
         </div>
         <div class="btn-group">
             <button id="eplStatus" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                 Статус трудоустройства <span class="caret"></span>
             </button>
             <ul class="dropdown-menu" id="a">
                 @foreach ($employment_status as $status)
                     <li><a class="dropdown-item" href="#"> {{$status->employment_status}}</a></li>
                 @endforeach
             </ul>

         </div>--}}


        <h4> Список студентов </h4>
        <table id="tableStudents" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">ФИО
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Группа
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Статус обучения
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Статус трудоустройства
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Комментарий
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            </tr>
            </thead>
            <tbody>
            @if ($all_students)
                @foreach ($all_students as $index)
                    <tr>
                        <td>
                            <a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->name}}</a>
                        </td>
                        <td>
                            <a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->group_name}}</a>
                        </td>
                        <td>
                            <a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->learning_status}}</a>
                        </td>
                        <td>
                            <a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->employment_status}}</a>
                        </td>
                        <td>
                            <a href="{{route('student.view', ['id' => $index->id] )}}">{{$index->comment}}</a>
                        </td>
                    </tr>
                @endforeach
                {{ $all_students->links() }}
            @endif
            </tbody>
        </table>
    </div>

    <div class="col-md-2 col-sm-6 ">
        {{--     <!-- form adding students to DB.
             Use data in php by
             $request->session()->keep(['name', 'email', 'site', 'text_area']);
             -->
             <div class="container">
                 <div>
                     <img style="max-width:100px; margin-top: -7px;"
                          src="/images/group.png">
                 </div>
                 <!-- Trigger the modal with a button -->
                 <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#myModal">Добавить нового
                     студента
                 </button>

                 <!-- Modal -->
                 <div class="modal fade" id="myModal" role="dialog">
                     <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">Добавление нового студента</h4>
                             </div>
                             <div class="modal-body">
                                 <form action="{{Route('add.student')}}" method="post" enctype="multipart/form-data">
                                     @csrf
                                     <p>Введите данные</p>
                                     <p>Имя студента</p>
                                     <p><input name="student_name"></p>
                                     <p>Фамалия студента</p>
                                     <p><input name="student_surname"></p>
                                     <p>Дата рождения студента</p>
                                     <p><input name="student_birth"></p>
                                     <p>Адрес студента</p>
                                     <p><input name="student_adress"></p>
                                     <p>E-mail студента</p>
                                     <p><input name="student_mail"></p>
                                     <p>Телефон студента</p>
                                     <p><input name="student_phone"></p>
                                     </br>
                                     <input type="submit" value="Add new student">
                                 </form>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </div>
                         </div>
                     </div>
                 </div>
                 <form action="{{Route('add.student')}}">
                     <input type="submit" value="Add new student">
                 </form>
             </div>
             <form role="search">
                 <div class="form-group">

                     <input type="search" name="search" class="form-control" id="search" placeholder="Поиск по сайту">
                     <div id="findResult">
                     </div>

                 </div>
                 <button type="submit" class="btn btn-default">Поиск</button>
             </form>--}}

        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <!-- Заголовок 1 панели -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Статус обучения</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <!-- Содержимое 1 панели -->
                    <div class="panel-body">
                        @foreach ($learning_status as $status)
                            <li><a class="dropdown-item" href="#"> {{$status->learning_status}}</a></li>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- 2 панель -->
            <div class="panel panel-default">
                <!-- Заголовок 2 панели -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Статус
                            трудоустройства</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <!-- Содержимое 2 панели -->
                    <div class="panel-body">
                        @foreach ($employment_status as $status)
                            <li><a class="dropdown-item" href="#"> {{$status->employment_status}}</a></li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@extends('layouts.footer')

{{-- <script src="/js/show.js"></script>--}}