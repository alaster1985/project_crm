<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


    <title>Студенты A-Level</title>
</head>
<body>

<!--<div class="btn-group container">
    <div class="col-md-2 col-sm-6 ">
        <div class="row">
            <button class="btn-block"><a href="{{route('started')}}">Студенты</a></button>
        </div>
        <div class="row">
            <button class="btn-block"><a href="{{route('started')}}">Преподаватели</a></button>
        </div>
        <div class="row">
            <button class="btn-block"><a href="{{route('started')}}">Партнеры</a></button>
        </div>
    </div>
-->
<div class="col-md-2 col-sm-6 ">
    <!-- form adding students to DB.
    Use data in php by
    $request->session()->keep(['name', 'email', 'site', 'text_area']);
    -->
    <form action="{{Route('add_student')}}" method="post">
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
        <input type="submit" value="Add new student">
    </form>
</div>

</div>


</body>
</html>
