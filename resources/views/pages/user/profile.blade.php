@extends('layouts.default')

@section('meta-description') профиль пользователя @endsection
@section('meta-title') {{ auth()->user()->name }} @endsection

@section('title') {{ auth()->user()->name }} @endsection

@section('header-content')
    @auth
        <a href="{{ route('app.add') }}" class="btn">добавить заявку</a>
        <form method="post" action="{{ route('auth.logout')  }}">
            @csrf
            <button class="btn">выйти</button>
        </form>
    @endauth
    @guest
        <a href="{{ route('auth.login') }}" class="btn">войти</a>
        <a href="{{ route('auth.register') }}" class="btn">создать аккаунт</a>
    @endguest
@endsection

@section('content')
    <div class="user-apps">
        @forelse ($apps as $app)
            <a href="#" class="user-app">
                <strong class="user-app__title">{{ $app->title }}</strong>
                <p class="user-app__text">{{ $app->text }}</p>
            </a>
        @empty
            <p>заявок нет(</p>
        @endforelse
    </div>
@endsection
