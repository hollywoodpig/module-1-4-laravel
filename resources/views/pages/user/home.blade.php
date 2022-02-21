@extends('layouts.default')

@section('meta-description') тут решенные проблемы, все дела @endsection
@section('meta-title') решенные проблемы @endsection

@section('title') решенные проблемы @endsection

@section('header-content')
    @auth
        <a href="{{ route('user.dashboard') }}" class="btn">Профиль</a>
    @endauth
    @guest
        <a href="{{ route('user.login') }}" class="btn">Войти</a>
        <a href="{{ route('user.register') }}" class="btn">Создать аккаунт</a>
    @endguest
@endsection

@section('content')
    ага да
@endsection
