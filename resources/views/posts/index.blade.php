@extends('layout')
@section('title')
Home page
@endsection

@section('content')
<div class="post-add-form">
    <div class="auth__register">
        <a href="{{route('posts.create')}}">New Post</a>
    </div>
    <div class="table">
        <ul class="table__head">
            <li>ID</li>
            <li>Title</li>
            <li>Created</li>
            <li>Updated</li>
            <li>Actions</li>
        </ul>

        @foreach($posts as $post)
        <ul class="table__body">
            <li>{{$post->id}}</li>
            <li>{{$post->title}}</li>
            <li>{{$post->created_at->setTimezone('Europe/Tallinn')}}</li>
            <li>{{$post->updated_at->setTimezone('Europe/Tallinn')}}</li>
            <li>
                <form method="POST" action="{{route('posts.destroy', ['post' => $post->id])}}">
                    @method('DELETE')
                    @csrf
                    <div class="auth__register">
                        <a class="btn btn-primary" href="{{route('posts.show', ['post' => $post->id])}}">View</a>
                    </div>
                    <div class="auth__register">
                        <a class="btn btn-warning" href="{{route('posts.edit', ['post' => $post->id])}}">Edit</a>
                    </div>
                    <div class="auth__register">
                        <button type="submit" value="Delete">Delete</button>
                    </div>
                </form>
            </li>
        </ul>
        @endforeach
    </div>
</div>
{{$posts->links()}}
@endsection