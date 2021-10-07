@extends('layouts.app')

@section('title')
    {{$article->name}}
@endsection

@section('header')
    {{$article->name}}
@endsection

@section('content')
    {{$article->body}}
@endsection
