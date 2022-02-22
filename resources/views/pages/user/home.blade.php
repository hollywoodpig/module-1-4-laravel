@extends('layouts.default')

@section('meta-description') тут решенные проблемы, все дела @endsection
@section('meta-title') решенные проблемы @endsection

@section('title') решенные проблемы @endsection

@section('header-content')
    @auth
        <a href="{{ route('user.profile') }}" class="btn">профиль</a>
    @endauth
    @guest
        <a href="{{ route('auth.login') }}" class="btn">войти</a>
        <a href="{{ route('auth.register') }}" class="btn">создать аккаунт</a>
    @endguest
@endsection

@section('content')
    ага да
@endsection
