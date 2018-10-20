@extends('layouts.nav')
<h2>Отправка Сообщений </h2>
<form action="{{Route('sendSMS')}}" method="post">
    @csrf
    Введите сообщение:<br>
    <textarea placeholder="Message" name="msg"></textarea><br>
    <input type="submit" value="Отправить">
</form>
