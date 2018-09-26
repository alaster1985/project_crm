<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--ADDING BOOTATRAP-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->



    <title>Главная страница A-Level</title>
</head>
<body>

<div class="btn-group container">
    <div class="col-md-2 col-sm-6 ">

        <div class="row">
            <button class="btn-block"><a href="{{route('ShowAllStudents')}}">Студенты</a></button>
        </div>
        <div class="row">
            <button class="btn-block"><a href="{{route('show.employees')}}">Сотрудники</a></button>
        </div>
        <div class="row">
            <button class="btn-block"><a href="{{route('index')}}">Партнеры</a></button>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 ">

        <form action="add_teacher.php" method="post">
            <p>Добавление нового студента</p>
            <p><input name="newstudent"></p>
        </form>

    </div>

</div>


</body>
</html>
