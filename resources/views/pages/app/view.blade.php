@extends('layouts.default')

@section('meta-description') {{ $app->description }} @endsection
@section('meta-title') {{ $app->title }} @endsection

@section('title') {{ $app->title }} @endsection

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
    <div class="app-full">
        <div class="app-full__gallery">
            <div class="app-full__img">
                <img class="app-full__img_blurred" src="{{ 'data:image/jpeg;base64,' . $app->img_before }}" alt="изображение до">
                <img src="{{ 'data:image/jpeg;base64,' . $app->img_before }}" alt="изображение до">
            </div>
            @isset ($app->img_after)
                <div class="app-full__img">
                    <img class="app-full__img_blurred" src="{{ 'data:image/jpeg;base64,' . $app->img_after }}" alt="изображение после">
                    <img src="{{ 'data:image/jpeg;base64,' . $app->img_after }}" alt="изображение после">
                </div>
            @endisset
        </div>
        <div class="inline inline_sm">
            <b @class([
                'text-accent' => $app->solved
            ])>
                {{ $app->solved ? 'Решено' : 'Пока не решено' }}
            </b>
            <em class="text-muted">{{ $app->created_at->diffForHumans() }}</em>
        </div>
        <p class="app-full__text">
            {{ $app->text }}
        </p>
        @if (auth()->user() && (auth()->user()->id == $app->user_id))
            <div class="inline inline_sm">
                <a href="#" class="btn btn_accent">Удалить</a>
                <a href="#" class="btn">Редактировать</a>
            </div>
        @endif
    </div>
@endsection
