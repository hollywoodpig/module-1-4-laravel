@extends('layouts.default')

@section('meta-description') профиль пользователя @endsection
@section('meta-title') {{ auth()->user()->name }} @endsection

@section('title') {{ auth()->user()->name }} @endsection

@section('header-content')
    @auth
        <a href="#" class="btn">мои заявки</a>
        <form method="post" action="{{ route('user.logout')  }}">
            @csrf
            <button class="btn">выйти</button>
        </form>
    @endauth
    @guest
        <a href="{{ route('user.login') }}" class="btn">войти</a>
        <a href="{{ route('user.register') }}" class="btn">создать аккаунт</a>
    @endguest
@endsection

@section('content')
    тут инфа обо мне и все такое
@endsection
