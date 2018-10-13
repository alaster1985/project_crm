<div class="top">
    <div class="container">
        <div class="row">
            <!-- NAV #1 -->
            <nav class="col-md-6 col-xl-12 order-md-1 order-xl-0">
                <div class="navbar navbar-default navbar-fixed-top">
                    <ul class="nav nav-pills nav-justified ">
                        <a class="navbar-brand" rel="home" href="#" title="A-level">
                            <img style="max-width:100px; margin-top: -7px;"
                                 src="/images/logo.png">
                        </a>
                        <li class="divider-vertioal"></li>
                        <li><a href="{{route('ShowAllStudents')}}">Студенты</a></li>
                        <li><a href="{{route('show.employees')}}">Сотрудники</a></li>
                        <li><a href="{{route('ShowCompanies')}}">Партнеры</a></li>
                        <li><a href="{{route('show.groups')}}">Группы А-левел</a></li>
                        <li><a href="{{route('showTasks')}}">Задания</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
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
            </nav>
            <!-- HEADER -->
            <header class="col-md-6 col-xl-12 order-md-0 order-xl-1">
                @yield('header')
            </header>
        </div>
    </div>
</div>
<!-- ОСНОВНОЙ КОНТЕНТ -->
<main>
    <div class="container-fluid">
        <div class="row">
            <!-- NAV #2 -->
            <nav class="col-xl-2">
                @yield('menu')
            </nav>
            <!-- ARTICLE -->
            <article class="col-md-8 col-xl-7">
                @yield('table')
            </article>
            <!-- ASIDE -->
            <aside class="col-md-4 col-xl-3">
                @yield('content')
            </aside>
        </div>
    </div>
</main>
<!-- FOOTER -->
<footer>
    <div class="container">

    </div>
</footer>