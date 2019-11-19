@extends('jasmine::auth.layout')

@section('content')
    <div class="card p-3">
        <div class="card-body">
            <div class="card-title h4">{{ __('Reset Password') }}</div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('jasmine.password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Send Password Reset Link') }}
                </button>

                <a class="btn btn-link mt-3" href="{{ route('jasmine.login') }}">
                    < {{ __('Back to login') }}
                </a>
            </form>
        </div>
    </div>
@endsection