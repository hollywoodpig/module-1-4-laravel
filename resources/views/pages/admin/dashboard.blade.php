@extends('layouts.default')

@section('meta-description') это админ панель, чел.. @endsection
@section('meta-title') {{ auth()->user()->name }} @endsection

@section('title') вы администратор, можете собой гордиться @endsection

@section('header-content')
    @auth
        <a href="{{ route('user.profile') }}" class="btn">профиль</a>
        <form method="post" action="{{ route('auth.logout')  }}">
            @csrf
            <button class="btn">выйти</button>
        </form>
    @endauth
@endsection

@section('content')
    <p>у вас неограниченная власть, делайте вообще что хотите</p>
    <div class="inline inline_sm">
        <a href="#" class="btn">список заявок</a>
        <a href="#" class="btn">список пользователей</a>
    </div>
@endsection
