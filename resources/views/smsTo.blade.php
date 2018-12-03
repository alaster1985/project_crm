@extends('layouts.nav')
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