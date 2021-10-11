@extends('layouts.app')

@section('title', 'Список статей')

@section('header', 'Список статей')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <a href="{{route('articles.create')}}">Создать статью</a>

    @foreach ($articles as $article)
        <h2><a href="{{route('articles.show', ['id' => $article->id])}}">{{$article->name}}</a></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
        <a href="{{route('articles.edit', ['id' => $article->id])}}">Изменить</a>
    @endforeach
@endsection

@section('pagination')
    {{$articles->links()}}
@endsection
