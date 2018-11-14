@extends('layouts.nav')
@section('title', 'Add Components')

<div class="row">
    <div class="form-group col-md-2 col-sm-3">
        @if ($errors->has('skill_name'))
            <div class="error">{{($errors->first('skill_name'))}}</div>
        @endif
        <label for="skill">SKILLS</label>
        <input type="button" id="new_skill" name="new_skill_button" value="Add new skill">
        <p class="help-block">доступные скилы</p>
        <ul>
            @foreach($skills as $skill)
                <li>{{$skill->skill_name}}</li>
            @endforeach
        </ul>
        <form action="{{Route('add.component')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div  id="new_skill_div">
            </div>
        </form>
    </div>
    <div class="form-group col-md-2 col-sm-3">
        @if ($errors->has('stack_name'))
            <div class="error">{{($errors->first('stack_name'))}}</div>
        @endif
        <label for="stacks">STACKS</label>
        <input type="button" id="new_stack" name="new_stack_button" value="Add new stack">
        <p class="help-block">доступные стэки технологий</p>
        <ul>
            @foreach($stacks as $stack)
                <li>{{$stack->stack_name}}</li>
            @endforeach
        </ul>
        <form action="{{Route('add.component')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div  id="new_stack_div">
            </div>
        </form>
    </div>
    <div class="form-group col-md-2 col-sm-3">
        @if ($errors->has('position'))
            <div class="error">{{($errors->first('position'))}}</div>
        @endif
        <label for="skill">POSITIONS</label>
        <input type="button" id="new_position" name="new_position_button" value="Add new position">
        <p class="help-block">доступные должности</p>
        <ul>
            @foreach($positions as $position)
                <li>{{$position->position}}</li>
            @endforeach
        </ul>
        <form action="{{Route('add.component')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div  id="new_position_div">
            </div>
        </form>
    </div>
    <div class="form-group col-md-2 col-sm-3">
        @if ($errors->has('direction'))
            <div class="error">{{($errors->first('direction'))}}</div>
        @endif
        <label for="skill">DIRECTIONS</label>
        <input type="button" id="new_direction" name="new_direction_button" value="Add new direction">
        <p class="help-block">доступные направления</p>
        <ul>
            @foreach($directions as $direction)
                <li>{{$direction->direction}}</li>
            @endforeach
        </ul>
        <form action="{{Route('add.component')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div  id="new_direction_div">
            </div>
        </form>
    </div>
</div>

@extends('layouts.footer')
<script src="/js/run2.js"></script>
