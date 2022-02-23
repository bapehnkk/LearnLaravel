@extends('layout')

@section('title')
{{ __('Login') }}
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

    <form action="{{ route('login') }}" class="form" method="POST">
        @csrf
        <div class="form__title">
            <div class="title">{{ __('E-Mail Address') }}</div>
            <input id="email" type="email" class="inp @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form__title">
            <div class="title">{{ __('Password') }}</div>
            <input id="password" type="password" class="inp @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form__title">
            <div class="title">{{ __('Remember Me') }}</div>
            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        </div>
        <button type="submit">{{ __('Login') }}</button>
        @if (Route::has('password.request'))
            <div class="auth__register">
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </div>
        @endif
    </form>
    
    @if (Route::has('register'))
        <div class="auth__register">
            <a href="{{ route('register') }}">{{ __('Register') }}</a>
        </div>
    @endif
</div>
@endsection
