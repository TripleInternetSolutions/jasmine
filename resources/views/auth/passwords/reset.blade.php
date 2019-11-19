@extends('jasmine::auth.layout')

@section('content')
    <div class="card p-3">
        <div class="card-body">
            <div class="card-title h4">{{ __('Reset Password') }}</div>

            <form method="POST" action="{{ route('jasmine.password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Reset Password') }}
                </button>

                <a class="btn btn-link mt-3" href="{{ route('jasmine.login') }}">
                    < {{ __('Back to login') }}
                </a>
            </form>
        </div>
    </div>
@endsection