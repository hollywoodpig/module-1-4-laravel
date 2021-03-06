@extends('layouts.default')

@section('meta-description') ну войти здесь надо @endsection
@section('meta-title') войти @endsection

@section('title') войти @endsection

@section('header-content')
    <a href="{{ route('auth.register') }}" class="btn">создать аккаунт</a>
@endsection

@section('content')
    <form class="form" method="post" action="{{ route('auth.doLogin')  }}">
        @csrf
        <input name="email" class="input" type="email" placeholder="введите почту">
        @if ($errors->has('email'))
            <p class="form__error">{{ $errors->first('email') }}</p>
        @endif
        <input name="password" class="input" type="password" placeholder="введите пароль">
        @if ($errors->has('password'))
            <p class="form__error">{{ $errors->first('password') }}</p>
        @endif
        <button class="btn btn_accent">войти</button>
    </form>
    <p class="text-muted">{{ session()->get('error') }}</p>
@endsection
