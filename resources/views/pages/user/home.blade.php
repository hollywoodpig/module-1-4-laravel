@extends('layouts.default')

@section('meta-description') тут решенные проблемы, все дела @endsection
@section('meta-title') решенные проблемы @endsection

@section('title') решенные проблемы @endsection

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
    <div class="apps">
        @forelse ($solved_apps as $app)
            <a href="{{ route('app.view', $app->id) }}" class="app">
                <img src="{{ 'data:image/jpeg;base64,' . $app->img_before }}" alt="изображение" class="app__image app__image_before">
                <img src="{{ 'data:image/jpeg;base64,' . $app->img_after }}" alt="изображение после" class="app__image app__image_after">
                <span class="app__title">{{ $app->title }}</span>
            </a>
        @empty
            <p>пока решенных заявок нет :(</p>
        @endforelse
    </div>
@endsection
