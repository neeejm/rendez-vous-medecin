@extends('layouts.app')

@section('head_content')
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap-select.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="main-content account-content">
    <div class="content">
        <div class="container">
            <div class="account-box">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="account-title">
                            <h3>Connexion</h3>
                    </div>
                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>

                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" >{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary account-btn">
                            {{ __('Login') }}
                        </button>

                    </div>
                    <div class="form-group text-right"> 
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group text-right"> 
                        <a href="forgot-password.html">Forgot your password?</a>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary account-btn" type="submit">Login</button>
                    </div>
                    <div class="text-center register-link">Don&#x2019;t have an account? 
                        <a href="register.html">Register Now</a>
                    </div> --}}

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
