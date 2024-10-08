@extends('layouts.app')

@section('title', trans('auth.login'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-lg-6">
        <h1>{{ trans('auth.login') }}</h1>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="email">{{ trans('auth.email') }}</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">{{ trans('auth.password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row gy-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" @checked(old('remember'))>

                                <label class="form-check-label" for="remember">
                                    {{ trans('auth.remember') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            @if(Route::has('password.request'))
                                <a class="float-md-end" href="{{ route('password.request') }}">
                                    {{ trans('auth.forgot_password') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary d-block">
                            {{ trans('auth.login') }}
                        </button>
                    </div>
                </form>
                <div class="col-md-12 text-center" style="margin-top: 20px;">
    <div class="btn-group" role="group" aria-label="Social login buttons">
        @plugin('discord-auth') {{-- if plugin discord-auth is enabled --}}
            <a class="btn btn-primary" href="{{ route('discord-auth.login') }}" role="button" style="margin-right: 10px; border-radius: 8px;">
                <i class="bi bi-discord" style="margin-right: 8px;"></i>
                {{ trans('discord-auth::messages.login_via_discord') }}
            </a>
        @endplugin

        @plugin('google-auth') {{-- if plugin google-auth is enabled --}}
            <a class="btn btn-primary" href="{{ route('google-auth.login') }}" role="button" style="border-radius: 8px;">
                <i class="bi bi-google" style="margin-right: 8px;"></i>
                {{ trans('google-auth::messages.login_via_google') }}
            </a>
        @endplugin
    </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
