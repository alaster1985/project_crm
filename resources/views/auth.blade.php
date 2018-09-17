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
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


     <title>Студенты A-Level</title>
 </head>
<body>

<div>
    
</div>

 <div class = "btn-group container">

  <div class = "row">
   <div class = "col-md-2 col-sm-4">
    <button>  <a href="{{route('started')}}">Студенты</a></button>

       <button type="button" class="btn btn-primary btn-lg"> <a href="{{route('started')}}">Студенты</a></button>
       <button type="button" class="btn btn-warning btn-lg btn-block"><a href="{{route('started')}}">Студенты</a></button>

   </div>
  </div>

  <div class = "row">
   <div class = "col-md-1 col-sm-6">
    <button>  <a href="{{route('started')}}">Преподаватели</a></button>
   </div>
  </div>

  <div class = "row">
   <div class = "col-md-1 col-sm-6">
    <button>  <a href="{{route('started')}}">Партнеры</a></button>
   </div>
  </div>

 </div>


 </body>
</html>
