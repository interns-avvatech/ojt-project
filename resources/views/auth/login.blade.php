@extends('layouts.auth')
@section('title', 'Login')
@section('auth-content')
<main class="col-md-6 mx-auto">
    <div class="card card-inverse card-flat" style="margin: 0 10.5rem 0 10.5rem">
        <div class="card-block" style="margin: 5rem 0 5rem 0">
            <h3 class="text-center font-weight-bold pb-4">Login</h3>
            <form method="POST" action="{{ route('login') }}" style="margin: 1rem 5rem 2rem 5rem">
                @csrf

                <div class="row" style="margin-bottom:2rem">

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username" style="  font-size: 1rem; padding: 1.5rem">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" style="  font-size: 1rem; padding: 1.5rem">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>



                            @if (Route::has('password.request'))
                        <labe class="float-right">
                        <a class="text-dark text-decoration-underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        </label>
                        @endif
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12 my-4">
                        <button type="submit" class="btn btn-secondary btn-block">
                            {{ __('Login') }}
                        </button>


                    </div>
                </div>
            </form>

        </div>
    </div>
</main>
@endsection