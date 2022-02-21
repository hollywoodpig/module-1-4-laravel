@extends('layouts.default')

@section('meta-description') ну войти здесь надо @endsection
@section('meta-title') войти @endsection

@section('title') войти @endsection

@section('header-content')
    <a href="{{ route('user.register') }}" class="btn">Создать аккаунт</a>
@endsection

@section('content')
    <form class="form" method="post" action="{{ route('user.doLogin')  }}">
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
@endsection
