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


    <title>@yield('title')</title>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
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
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
    </ul>
</div>