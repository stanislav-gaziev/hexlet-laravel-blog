@extends('layouts.app')

@section('title', 'Новая статья')

@section('header', 'Новая статья')

@section('content')
    {{ Form::model($article, ['url' => route('articles.store')]) }}
        @include('article.form')
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
