@extends('layouts.default')

@section('meta-description') тут надо создавать заявку, да @endsection
@section('meta-title') создание заявки @endsection

@section('title') создание заявки @endsection

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
    <form class="form" method="post" action="{{ route('app.doAdd') }}" enctype="multipart/form-data">
        @csrf
        <input name="title" class="input" type="text" placeholder="название заявки">
        @if ($errors->has('title'))
            <p class="form__error">{{ $errors->first('title') }}</p>
        @endif
        <textarea name="text" class="input" placeholder="текст заявки"></textarea>
        @if ($errors->has('text'))
            <p class="form__error">{{ $errors->first('text') }}</p>
        @endif
        <label class="input input_file">
            <input name="img_before" type="file">
            <p class="input_file__label">изображение</p>
        </label>
        @if ($errors->has('img_before'))
            <p class="form__error">{{ $errors->first('img_before') }}</p>
        @endif
        <button class="btn btn_accent">создать</button>
    </form>
@endsection
