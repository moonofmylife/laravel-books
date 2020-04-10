@extends('layouts.app')

@section('title', trans('auth.login.title'))

@section('container')
    <section class="uk-section uk-section-large uk-flex uk-flex-center">
        <div class="uk-card uk-card-default" uk-grid>
            <div class="uk-card-media-left uk-cover-container uk-visible@m">
                <div class="uk-background-cover uk-card-image" style="background-image: url('images/illustrations/book_reading_1.svg');">
                </div>
            </div>
            <div class="card-inputs">
                <div class="uk-card-body">
                    <div class="uk-card-title">
                        @lang('auth.login.greeting')
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input class="uk-input @error('email') uk-form-danger @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="@lang('auth.placeholder.email')" required autocomplete="email" autofocus>
                            </div>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input class="uk-input @error('password') uk-form-danger @enderror" type="password" name="password" placeholder="@lang('auth.placeholder.password')" required autocomplete="current-password">
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="uk-margin">
                            <label class="remember-me"><input class="uk-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('auth.placeholder.remember_me')</label>
                        </div>

                        <div class="uk-margin">
                            <button class="uk-button uk-button-default button-primary" type="submit">@lang('auth.login.button')</button> @lang('auth.login.register_link_prefix') <a class="action-link" href="{{ route('register') }}">@lang('auth.login.register_link')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
