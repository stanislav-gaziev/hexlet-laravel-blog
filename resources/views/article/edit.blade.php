@extends('layouts.app')

@section('title', 'Изменение статьи')

@section('header', 'Изменение статьи')

@section('content')
    {{ Form::model($article, ['url' => route('articles.update', $article), 'method' => 'PATCH']) }}
        @include('article.form')
        {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
