@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center font-bold"><h3> {{ __('Login') }}</h3></div>

                    <div class="card-body   text-white">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        @if (Auth::check())
            @if (Auth::user()->role === 'admin')
                <a href="index" class="btn btn-secondary btn-sm">
                    <i class="mai-home-outline"></i> Back to Admin Dashboard</a>
            @elseif (Auth::user()->role === 'doctor')
                <a href="home1" class="btn btn-secondary btn-sm">
                    <i class="mai-home-outline"></i> Back to Doctor Dashboard</a>
            @elseif (Auth::user()->role === 'patient')
                <a href="home" class="btn btn-secondary btn-sm">
                    <i class="mai-home-outline"></i> Back to Patient Dashboard</a>
            @endif
        @endif
    </div>
    <div class="text-center">
        <a href="{{ ('index') }}" class="btn btn-secondary btn-sm">
            <i class="mai-home-outline"></i> {{ __('Back to dashboard')}}</a>
    </div>
@endsection
