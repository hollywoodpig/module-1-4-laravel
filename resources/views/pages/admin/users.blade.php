@extends('layouts.default')

@section('meta-description') ну, тут все пользователи, в общем @endsection
@section('meta-title') все пользователи @endsection

@section('title') все пользователи @endsection

@section('header-content')
    @auth
        <a href="{{ route('admin.dashboard') }}" class="btn">панель</a>
    @endauth
@endsection

@section('content')
    <div class="users">
        @forelse ($users as $user)
            <div class="user">
                <div class="inline inline_sm inline_between">
                    <h3 class="user__name">{{ $user->name }}</h3>
                    <a href="{{ route('admin.appsByUser', $user->id) }}" @class([
                        'text-accent',
                        'disabled' => $user->apps->count() < 1
                    ])>
                        {{ $user->apps->count() }} заявок
                    </a>
                </div>
                <span class="user__email">{{ $user->email }}</span>
                <small class="user__date">создал аккаунт {{ $user->created_at->diffForHumans() }}</small>
            </div>
        @empty
        @endforelse
    </div>
@endsection
