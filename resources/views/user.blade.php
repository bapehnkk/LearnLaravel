@extends('layout')
@section('title', $user->name)
@section('content')
<div class="post-view">
    <div class="card">
        <div class="auth__register">
            <a href="{{url()->previous()}}">Back</a>
        </div>
        <div class="card__title">{{ $user->name }}</div>
        <div class="card__text">Email: {{ $user->email }}</div>
        <div class="card__text">Posts: {{ $user->posts()->count() }}</div>
        <div class="card__text">Likes: {{ $user->hadLiked()->count() }}</div>
        <div class="card__text">Comments: {{ $user->comments()->count() }}</div>
    </div>

</div>

@include('partials.posts', ['posts' => $user->posts()->paginate()])

{{ $user->posts()->paginate()->links() }}
@endsection