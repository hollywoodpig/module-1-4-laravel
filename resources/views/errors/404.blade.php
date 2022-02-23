@extends('layouts.default')

@section('meta-description') ой-ей, кажется, это не та страница @endsection
@section('meta-title') ой @endsection

@section('title') 404 @endsection

@section('content')
    <span class="text-muted">похоже, такой страницы не существует, попробуйте, ну не знаю, нормально пользоваться сайтом</span>
    <a href="{{ route('user.home') }}" class="btn btn_accent">домой</a>
@endsection
