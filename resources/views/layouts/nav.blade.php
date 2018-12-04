<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
<header>
    <!-- Классы navbar и navbar-default (базовые классы меню) -->
    <nav class=" navbar navbar-default navbar-fixed-top ">
        <!-- Контейнер (определяет ширину Navbar) -->
        <div class="container-fluid">
            <!-- Заголовок -->
            <div class="navbar-header">
                <!-- Кнопка «Гамбургер» отображается только в мобильном виде (предназначена для открытия основного содержимого Navbar) -->
                <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Бренд или название сайта (отображается в левой части меню) -->
                {{--<a class="navbar-brand" href="{{route('index')}}" title="A-level">--}}
                <a class="navbar-brand" href="{{route('alevel')}}" title="A-level">
                    <img style="max-width:100px; margin-top: -7px;"
                         src="/images/logo.png"> </a>
            </div>
            <!-- Основная часть меню (может содержать ссылки, формы и другие элементы) -->
            <div class="{{--navbar navbar-default navbar-fixed-top --}}collapse navbar-collapse" id="navbar-main">
                <ul class="nav nav-pills nav-justified ">
                    <li><a href="{{route('ShowAllStudents')}}">Студенты</a></li>
                    <li><a href="{{route('show.employees')}}">Сотрудники</a></li>
                    <li><a href="{{route('ShowCompanies')}}">Партнеры</a></li>
                    <li><a href="{{route('show.groups')}}">Группы А-левел</a></li>
                    <li><a href="{{route('showTasks')}}">Задания</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropMenu">
                            <ul>
                                <li><a class="dropdown-item" href={{ route('profile', Auth::user()) }}>Профиль</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout')}}

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="btn  btn-link btn-lg ">
                            <a class="glyphicon glyphicon-cog" href="{{route('addcompot')}}"
                               title="Добавить компоненты"></a>
                        </button>

                        <button class="btn btn-link btn-lg" type="button" data-toggle="modal" data-target="#SMSModal">
                            <i class='glyphicon glyphicon-comment' title="Отправить SMS на любой номер"></i>
                        </button>
                        <div id="SMSModal" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type="button" data-dismiss="modal">×</button>
                                        <h4 class="modal1-title">Отправить SMS</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{Route('sendSmsTo')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <p>Контактный номер:</p>
                                            <p><input type="text" class="form-control"
                                                      placeholder="+380955702380" name="mobile" required>
                                            </p>
                                            <p>Текст сообщения:</p>
                                            <p><input type="text" class="form-control" placeholder="Текст сообщения"
                                                      name="msg" required>
                                            </p>
                                            <input type="submit" value="Отправить">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-link btn-lg" type="button" data-toggle="modal"
                                data-target="#myModal"><i
                                    class='glyphicon glyphicon-envelope' title="Отправить email на любой адрес"></i>
                        </button>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type="button" data-dismiss="modal">×</button>
                                        <h4 class="modal-title">Отправить email</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{Route('sendSmsTo')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <p>Контактный номер:</p>
                                            <p><input type="text" class="form-control"
                                                      placeholder="+380955702380" name="mobile" required>
                                            </p>
                                            <p>Текст сообщения:</p>
                                            <p><input type="text" class="form-control" placeholder="Текст сообщения"
                                                      name="msg" required>
                                            </p>
                                            <input type="submit" value="Отправить">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

