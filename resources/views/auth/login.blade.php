@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-md-flex justify-content-center mt-5">
        <div><h2 class="display-4">Welcome to Blogger!!</h2></div>
    </div>
    <div class="d-md-flex justify-content-center">
        <div class="p-2"><h5>Write and share your blog now!!</h5></div>
    </div>
    <div class="d-md-flex justify-content-center mt-5 py-5 bg-primary">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right text-white">@lang('auth.username')</label>

                <div class="col-md-8">
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                           name="username" value="{{ old('username') }}" autocomplete="username" autofocus maxlength="20">
                    @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right text-white">@lang('auth.password')</label>

                <div class="col-md-8">
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           autocomplete="current-password" maxlength="20">

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>

                        <label class="form-check-label text-white" for="remember">
                            @lang('auth.remember')
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-white">
                        @lang('auth.login')
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
