@extends('layouts.nav')
@section('title', 'Компании')
<div>

    <ul>
        @if ($all_companies)
            @foreach ($all_companies as $index)
                <li>
                    <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->company_name}}</a>
                    <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->status}}</a>
                    <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->type}}</a>
                    <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->site}}</a>
                    <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->address}}</a>
                    <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->logo}}</a>
                    <a href="{{route('company.view', ['id' => $index->id] )}}">{{$index->comment}}</a>
                </li>
        @endforeach
                {{ $all_companies->links() }}
        @endif
    </ul>
</div>
@extends('layouts.footer')