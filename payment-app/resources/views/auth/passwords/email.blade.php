@extends('layouts.auth')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="content">
        <div class="left">
            <h2>
                <img src="{{ asset('dist/img/logo.png') }}" alt="">
            </h2>
            <h1>Nation Registry for Radiation workers</h1>
            <p>Individual Monitoring information</p>
        </div>

        <div class="right">
            <p class="font-weight-bolder">RESET PASSWORD</p>
            
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" novalidate="">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="submit" class="form-control green-button" value="Send Password Reset Link">

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Cancel') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
@endsection
