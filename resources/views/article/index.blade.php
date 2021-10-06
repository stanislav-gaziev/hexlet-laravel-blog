@extends('layouts.app')

@section('title', 'Список статей')

@section('menu')
    <a href="{{$url}}">Статьи</a>
@endsection

@section('header', 'Список статей')

@section('content')
    @foreach ($articles as $article)
        <h2>{{$article->name}}</h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection

@section('pagination')
    {{$articles->links()}}
@endsection
