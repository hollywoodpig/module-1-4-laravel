@extends('layouts.default')

@section('meta-description') {{ $app->description }} @endsection
@section('meta-title') изменить "{{ $app->title }}" @endsection

@section('title') изменить "{{ $app->title }}" @endsection

@section('header-content')
    @auth
        @if (auth()->user()->admin)
            <a href="{{ route('user.profile') }}" class="btn">профиль</a>
            <a href="{{ route('admin.dashboard') }}" class="btn">панель</a>
        @else
            <a href="{{ route('user.profile') }}" class="btn">профиль</a>
        @endif
    @endauth
@endsection

@section('content')
    <form class="form" method="post" action="{{ route('app.doEdit', $app->id) }}" enctype="multipart/form-data">
        @csrf
        @if (!auth()->user()->admin)
            <input value="{{ $app->title }}" name="title" class="input" type="text" placeholder="Название заявки">
            @if ($errors->has('title'))
                <p class="form__error">{{ $errors->first('title') }}</p>
            @endif
            <textarea name="text" class="input" placeholder="Текст заявки">{{ $app->text }}</textarea>
            @if ($errors->has('text'))
                <p class="form__error">{{ $errors->first('text') }}</p>
            @endif
            <label class="input input_file">
                <input name="img_before" type="file">
                <p class="input_file__label">Изображение до</p>
            </label>
            @if ($errors->has('img_before'))
                <p class="form__error">{{ $errors->first('img_before') }}</p>
            @endif
        @endif
        @if (auth()->user()->admin)
            <label class="input input_file">
                <input name="img_after" type="file">
                <p class="input_file__label">Изображение после</p>
            </label>
            @if ($errors->has('img_after'))
                <p class="form__error">{{ $errors->first('img_after') }}</p>
            @endif
            <div class="checkbox">
                <input class="checkbox__input" {{ $app->solved ? 'checked' : '' }} type="checkbox" name="solved" id="solved">
                <label class="checkbox__box" for="solved"></label>
                <label for="solved" class="checkbox__text">решено</label>
            </div>
            @if ($errors->has('solved'))
                <p class="form__error">{{ $errors->first('solved') }}</p>
            @endif
        @endif
        <div class="inline inline_sm">
            <button class="btn btn_accent">отправить</button>
            <a href="{{ route('app.view', $app->id) }}" class="btn">я передумал</a>
        </div>
    </form>
@endsection
