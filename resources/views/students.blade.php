<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <title>Студенты A-Level</title>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">Mark Otto</a></p>
    <ul class="nav nav-pills nav-justified ">
        <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
            <img style="max-width:100px; margin-top: -7px;"
                 src="/images/logo.png">
        </a>
        <li class="divider-vertioal"></li>
        <li><a href="{{route('ShowAllStudents')}}">Студенты</a></li>
        <li><a href="{{route('show.employees')}}">Сотрудники</a></li>
        <li><a href="{{route('index')}}">Партнеры</a></li>
        <li><a href="{{route('show.groups')}}">Группы А-левел</a></li>
        <li class="divider-vertioal"></li>
    </ul>
</div>
<div class="container-fluid">
    {{--  Это бутофория
      В этом месте будет меню-аккордион по направлениям и группам--}}
    <div class="col-md-2 col-sm-4 ">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Поиск</button>
        </form>
        <p></p>
        <ul class="list-group">
            <li class="list-group-item">PHP Продвинутый</li>
            <li class="list-group-item">FRONT_END Продвинутый</li>
            <li class="list-group-item">HR/RECRUITMENT РАСШИРЕННЫЙ</li>
            <li class="list-group-item">QA AUTOMATION РАСШИРЕННЫЙ</li>
            <li class="list-group-item">FULLSTACK JS РАСШИРЕННЫЙ</li>
            <li class="list-group-item">FULLSTACK JS РАСШИРЕННЫЙ</li>
            <li class="list-group-item">FULLSTACK JS РАСШИРЕННЫЙ</li>
            <li class="list-group-item">FULLSTACK JS РАСШИРЕННЫЙ</li>
            <li class="list-group-item">FULLSTACK JS РАСШИРЕННЫЙ</li>
            <li class="list-group-item">FULLSTACK JS РАСШИРЕННЫЙ</li>
            <li class="list-group-item">FULLSTACK JS РАСШИРЕННЫЙ</li>
        </ul>
    </div>

    <div class="col-md-6 col-sm-6 ">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Группа</th>
                <th>Статус обучения</th>
                <th>Статус трудоустройства</th>
                <th>Коментарий</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Изменить</td>

            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Изменить</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Изменить</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Изменить</td>
            </tr>

            </tbody>
        </table>
        <div>

            <ul>
                @if ($all_students)
                    @foreach ($all_students as $index)
                        <li>
                            <a>{{$index->name}} : </a>
                            <a href="{{route('student.view', ['id' => $index->id] )}}">View Student's page</a>

                        </li>
                    @endforeach
                    {{ $all_students->links() }}
                @endif
            </ul>


        </div>
    </div>


    <div class="col-md-2 col-sm-6 ">
        <!-- form adding students to DB.
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
            <form action="{{Route('add.student')}}" method="post" enctype="multipart/form-data">
                @csrf
                <p>Добавление нового студента</p>
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


    </div>


</div>
</body>
<footer class="page-footer font-small blue">

    <!-- указать наши данные -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

</footer>
</html>
