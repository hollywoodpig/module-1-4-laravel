@extends('layouts.default')

@section('meta-description') ой-ей, кажется, это не та страница @endsection
@section('meta-title') ой @endsection

@section('title') 404 @endsection

@section('header-content')
    @auth
        @if (auth()->user()->admin)
            <a href="{{ route('admin.dashboard') }}" class="btn">панель</a>
        @else
            <a href="{{ route('user.profile') }}" class="btn">профиль</a>
        @endif
    @endauth
    @guest
        <a href="{{ route('auth.login') }}" class="btn">войти</a>
        <a href="{{ route('auth.register') }}" class="btn">создать аккаунт</a>
    @endguest
@endsection

@section('content')
    <span class="text-muted">похоже, такой страницы не существует, попробуйте, ну не знаю, нормально пользоваться сайтом</span>
@endsection
