@extends('layouts.nav')
<h2>Отправка Сообщений </h2>
<form action="{{Route('sendSmsTo')}}" method="post">
    @csrf
    Введите телефон:<br>
    <input type="text" placeholder="+380955702380" name="mobile"><br>
    Введите сообщение:<br>
    <textarea placeholder="Message" name="msg"></textarea><br>
    <input type="submit" value="Отправить">
</form>