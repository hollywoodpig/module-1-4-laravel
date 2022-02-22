@extends('layouts.default')

@section('meta-description') это админ панель, чел.. @endsection
@section('meta-title') {{ auth()->user()->name }} @endsection

@section('title') вы администратор, можете собой гордиться @endsection

@section('header-content')
    @auth
        <form method="post" action="{{ route('auth.logout')  }}">
            @csrf
            <button class="btn">выйти</button>
        </form>
    @endauth
@endsection

@section('content')
    <p class="text-muted">у вас неограниченная власть, делайте вообще что хотите</p>
    <div class="inline inline_sm">
        <a href="{{ route('admin.apps') }}" class="btn">список заявок</a>
        <a href="{{ route('admin.users') }}" class="btn">список пользователей</a>
    </div>
@endsection
