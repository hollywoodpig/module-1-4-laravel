@extends('layouts.default')

@section('meta-description') ну создать аккаунт здесь надо @endsection
@section('meta-title') создать аккаунт @endsection

@section('title') создать аккаунт @endsection

@section('header-content')
    <a href="{{ route('auth.login') }}" class="btn">войти</a>
@endsection

@section('content')
    <form class="form" method="post" action="{{ route('auth.doRegister')  }}">
        @csrf
        <input name="name" class="input" type="text" placeholder="введите фио">
        @if ($errors->has('name'))
            <p class="form__error">{{ $errors->first('name') }}</p>
        @endif
        <input name="email" class="input" type="text" placeholder="введите почту">
        @if ($errors->has('email'))
            <p class="form__error">{{ $errors->first('email') }}</p>
        @endif
        <input name="password" class="input" type="password" placeholder="введите пароль">
        @if ($errors->has('password'))
            <p class="form__error">{{ $errors->first('password') }}</p>
        @endif
        <button class="btn btn_accent">создать</button>
    </form>
@endsection
