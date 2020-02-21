@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3
                            class="text-center font-weight-light my-4">{{ __('auth.login') }}</h3></div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="user-block block text-center badge-danger p-1">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group"><label class="small mb-1"
                                                           for="inputEmailAddress">{{ __('auth.email') }}</label>
                                <input class="form-control py-4 @error('email') is-invalid @enderror"
                                       name="email"
                                       id="inputEmailAddress" value="{{ old('email') }}" type="email"/></div>
                            <div class="form-group"><label class="small mb-1"
                                                           for="inputPassword">{{ __('auth.password') }}</label>
                                <input class="form-control py-4 @error('password') is-invalid @enderror"
                                       name="password" id="inputPassword" type="password"/></div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox"><input
                                        class="custom-control-input" id="rememberPasswordCheck"
                                        type="checkbox"
                                        name="remember" {{ old('remember') ? 'checked' : '' }}/><label
                                        class="custom-control-label"
                                        for="rememberPasswordCheck">{{ __('auth.remember_me') }}</label></div>
                            </div>

                            <div
                                class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
{{--                                <a class="small"--}}
{{--                                   href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}--}}
{{--                                </a>--}}
                                <button type="submit" class="btn btn-primary">{{ __('auth.login_to') }}</button>
                            </div>
                        </form>
                    </div>
{{--                    <div class="card-footer text-center">--}}
{{--                        <div class="small"><a href="{{ route('register') }}">{{ __('auth.need_account') }}</a></div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
