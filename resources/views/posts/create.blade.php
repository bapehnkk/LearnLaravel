@extends('layout')
@section('title', 'New Post')
@section('content')
<div class="auth">
    
    <form class="form" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            @error('title')
            @foreach($errors->get('title') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <div >
                <div class="title">Title</div>
                <input type="text" class="inp" name="title" value="{{ old('title') }}">
            </div>
            @error('body')
            @foreach($errors->get('body') as $error)
                <div class="" role="alert">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <div class="mb-3">
                <div class="title">Content</div>
                <textarea class="inp" id="body" rows="15" name="body">{{ old('body') }}</textarea>
            </div>
            @error('image')
            @foreach($errors->get('image') as $error)
                <div class="" role="alert">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <div class="mb-3">
                <div class="title">Image</div>
                <input type="file" class="inp" id="image" name="image" accept="image/*">
            </div>
            <div class="auth__register" type="submit"><button>Create</button></div>
        </form>
</div>
@endsection
