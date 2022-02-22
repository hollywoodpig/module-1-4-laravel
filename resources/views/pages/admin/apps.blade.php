@extends('layouts.default')

@section('meta-description') ну, тут все заявки, в общем @endsection
@section('meta-title') все заявки @endsection

@section('title') все заявки @endsection

@section('header-content')
    @auth
        <a href="{{ route('user.profile') }}" class="btn">профиль</a>
        <a href="{{ route('admin.dashboard') }}" class="btn">панель</a>
    @endauth
@endsection

@section('content')
    <div class="apps">
        @forelse ($apps as $app)
            <a href="{{ route('app.view', $app->id) }}" class="app">
                <img src="{{ 'data:image/jpeg;base64,' . $app->img_before }}" alt="изображение" class="app__image app__image_before">
                @if ($app->img_after)
                    <img src="{{ 'data:image/jpeg;base64,' . $app->img_after }}" alt="изображение после" class="app__image app__image_after">
                @endif
                <span class="app__title">{{ $app->title }}</span>
            </a>
        @empty
            <p>пока заявок нет :(</p>
        @endforelse
    </div>
@endsection
