@extends('layouts.auth')

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

            <form method="POST" action="{{ route('password.update') }}" novalidate="">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <input type="submit" class="form-control green-button" value="Reset Password">
            </form>
        </div>
    </div>
@endsection
