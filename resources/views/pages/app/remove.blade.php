@extends('layouts.default')

@section('meta-description') удаление заявки, чел.. @endsection
@section('meta-title') удаление заявки @endsection

@section('title') вы уверены? @endsection

@section('header-content')
    @auth
        @if (auth()->user()->admin)
            <a href="{{ route('admin.dashboard') }}" class="btn">панель</a>
        @else
            <a href="{{ route('user.profile') }}" class="btn">профиль</a>
        @endif
    @endauth
@endsection

@section('content')
    <div class="inline inline_sm">
        <form method="post" action="{{ route('app.doRemove', $id) }}">
            @csrf
            <button class="btn">да</button>
        </form>
        <a class="btn btn_accent" href="{{ route('app.view', $id) }}">нет</a>
    </div>
@endsection
