<link rel="stylesheet" href="{{ asset('/css/styles.css') }}"/>


<div id="imga">
    <img src="/images/image.jpg" alt="текст" id="pic"/>
</div>

<a>{{$studentView->name}} : </a>
</br>
<a>{{$studentView->contact}} </a>
</br>
<a>{{$studentView->communication_tool}} </a>
</br>
</br>

{{--Форма для загрузки изображений. Использовать можно в любом файле.
После загрузки возвращается на страницу, откуда вызвана--}}
<form action="{{Route('add.image')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="fileform">
        <div class="selectbutton">Выберите изображение</div>
        <input id="upload" type="file" name="image"/>
    </div>
    <input type="submit" value="Add image to user">
</form>

