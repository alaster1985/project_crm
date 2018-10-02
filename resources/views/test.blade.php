<h2>Register!</h2>

<?php

//echo Form::open('register', 'POST');
echo Form::open();
echo Form::label('username', 'Username') . Form::text('username', Input::old('username'));
echo Form::label('email', 'E-mail') . Form::text('email', Input::old('email'));
echo Form::label('password', 'Password') . Form::password('password');

echo Form::submit('Register!');

echo Form::token() . Form::close();

?>