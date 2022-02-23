@extends('layout')
@section('title', $post->title)
@section('content')
<div class="post-view">
    <div class="auth__register">
        <a href="{{url()->previous()}}">Back</a>
    </div>
    <div class="card">
        @if($post->images->count() > 1)
        @include('partials.carousel', ['images' => $post->images, 'id' => $post->id])
        @elseif($post->images->count() == 1)
        <img src="{{$post->images->first()->path}}" class="card-img-top">
        @endif
    </div>

    <div class="card">
        <div class="card__title">{{ $post->title }}</div>
        <div class="card__text">{!! $post->displayBody !!}</div>
        <a class="card__user" href="/user/{{ $post->user->id }}">{{ $post->user->name }}</a>

        <div class="card__title"><b>Likes:</b> {{ $post->likes()->count() }}</div>
        <a href="{{ route('post.like', ['post' => $post->id]) }}" class="card__like">
            @if($post->auth_has_liked)
            Unlike
            @else
            Like
            @endif
        </a>
    </div>
    <div class="card">
        <form action="/post/{{$post->id}}" method="POST" class="comment-add">
            <div class="title">Add comment:</div>
            <textarea name="body"></textarea>
            @csrf

            <div class="auth__register">
                <button type="submit">Send</button>
            </div>
        </form>
    </div>

    @foreach($post->comments as $comment)
    <div class="card comment">
        <div class="card__text">{{ $comment->body }}</div>
        <p class="card__time">{{ $comment->created_at->diffForHumans() }}</p>
        <a class="card__user" href="/user/{{ $comment->user->name }}">{{ $comment->user->name }}</a>
    </div>
    @endforeach
</div>
@endsection