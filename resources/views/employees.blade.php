<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <title>Сотрудники A-Level</title>
</head>
<body>

<div class="col-md-2 col-sm-6 ">
    <!-- form adding students to DB.
    Use data in php by
    $request->session()->keep(['name', 'email', 'site', 'text_area']);
    -->
    <form action="{{Route('add.employee')}}" method="post">
        @csrf
        <p>Добавление нового сотрудника</p>
        <p>Имя студента</p>
        <p><input name="employee_name"></p>
        <p>Фамалия студента</p>
        <p><input name="employee_surname"></p>
        <p>Дата рождения студента</p>
        <p><input name="employee_birth"></p>
        <p>Адрес студента</p>
        <p><input name="employee_adress"></p>
        <p>E-mail студента</p>
        <p><input name="employee_mail"></p>
        <p>Телефон студента</p>
        <p><input name="employee_phone"></p>
        <input class="btn-block" type="submit" value="Add new employee">
    </form>
    <button class="btn-block"><a href="{{route('index')}}">На главную</a></button>
</div>


<div class="col-md-2 col-sm-6 ">

    <ul>
        @if ($all_employees)
            @foreach ($all_employees as $index)
                <li>
                    <a>{{$index->name}} : </a>
                    <a href="{{route('employee.view', ['id' => $index->id_person] )}}">View Emploee</a>
                </li>
            @endforeach
            {{ $all_employees->links() }}
        @endif
    </ul>
</div>


</body>
</html>
