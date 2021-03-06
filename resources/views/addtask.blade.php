@extends('layouts.nav')
@section('title', 'Add Task')
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<div class="container-fluid">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{Route('add.task')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Добавить задачу</p>
        <div class="row">
            <div class="form-group col-md-3 col-sm-2">
                <label for="task_name">Заголовок задачи</label>
                @if ($errors->has('task_name'))
                <div class="error">{{($errors->first('task_name'))}}</div>
                @endif
                <input class="form-control" name="task_name"
                       value="{{old('task_name')}}" placeholder="Заголовок задачи">
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group  col-md-3 col-sm-2">
                <label for="description">Описание задачи</label>
                @if ($errors->has('description'))
                <div class="error">{{($errors->first('description'))}}</div>
                @endif
                <input class="form-control" name="description"
                       value="{{old('description')}}" placeholder="Описание задачи">
                <p class="help-block">*обязательное поле</p>
            </div>
            <div class="form-group col-md-3 col-sm-2">
                <label for="dead_line">Срок выполнения</label>
                @if ($errors->has('dead_line'))
                <div class="error">{{($errors->first('dead_line'))}}</div>
                @endif
                <p><input type="date" class="form-control" placeholder="Дата" name="dead_line" value="{{old('dead_line')}}" required></p>
                <p class="help-block">*обязательное поле</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-3">
                <label for="user_id_doer">Исполнитель</label>
                @if ($errors->has('user_id_doer'))
                    <div class="error">{{($errors->first('user_id_doer'))}}</div>
                @endif
                <div>
                    <select name="user_id_doer" class="form-control">
                        <option selected value="{{old('user_id_doer')}}" >Выберите исполнителя</option>
                        @foreach($usersIdDoer as $userIdDoer)
                            <option value="{{$userIdDoer->id}}">{{$userIdDoer->name}}</option>
                        @endforeach
                    </select>
                    <p class="help-block">*обязательное поле</p>
                </div>
            </div>
        </div>
        <div><input type="submit" value="Добавить задачу"></div>
    </form>
</div>

@extends('layouts.footer')
