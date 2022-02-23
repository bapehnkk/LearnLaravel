@extends('layout')
@section('title')
{{ __('Register') }}
@endsection

@section('title')
LogIn
@endsection
@section('content')
<div class="auth">
    @if($errors->any())
        <lu class="errors">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </lu>
    @endif

    <form action="{{ route('register') }}" class="form" method="POST">
        @csrf
        <div class="form__title">
            <div class="title">{{ __('Name') }}</div>
            <input id="name" type="text" class="inp @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form__title">
            <div class="title">{{ __('E-Mail Address') }}</div>
            <input id="email" type="email" class="inp @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form__title">
            <div class="title">{{ __('Password') }}</div>
            <input id="password" type="password" class="inp @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form__title">
            <div class="title">{{ __('Confirm Password') }}</div>
            <input id="password-confirm" type="password" class="inp" name="password_confirmation" required autocomplete="new-password">
        </div>
        <button type="submit">{{ __('Register') }}</button>
    </form>
</div>
@endsection