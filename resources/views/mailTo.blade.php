@extends('layouts.nav')
<form action="{{Route('sendMailTo')}}" method="post"
      enctype="multipart/form-data">
    @csrf
    {{--<p>Адрес почты:</p>--}}
    {{--<p><input type="text" class="form-control" placeholder="igor.baranchuk333@gmail.com" name="email" required>--}}
    {{--</p>--}}
    {{--<p>Адрес почты:</p>--}}
    {{--<p><input type="text" class="form-control" placeholder="Тема письма"--}}
              {{--name="tema" required>--}}
    {{--</p>--}}
    <p>Текст письма:</p>
    <p><input type="text" class="form-control" placeholder="Текст письма"
              name="msg" required>
    </p>
    <input type="submit" value="Отправить">
</form>