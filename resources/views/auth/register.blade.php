@extends('layouts.app')

@section('title', trans('auth.register.title'))

@section('container')
    <section class="uk-section uk-section-large uk-flex uk-flex-center">
        <div class="uk-card uk-card-default" uk-grid>
            <div class="uk-card-media-left uk-cover-container uk-visible@m">
                <div class="uk-background-cover uk-card-image" style="background-image: url('images/illustrations/book_reading_2.svg');">
                </div>
            </div>
            <div class="card-inputs">
                <div class="uk-card-body">
                    <div class="uk-card-title">
                        @lang('auth.register.greeting')
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="uk-margin">
                            <input class="uk-input @error('name') uk-form-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="@lang('auth.placeholder.name')" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input @error('email') uk-form-danger @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="@lang('auth.placeholder.email')" autocomplete="email" required autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input @error('password') uk-form-danger @enderror" type="password" name="password" placeholder="@lang('auth.placeholder.password')" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input" type="password" name="password_confirmation" placeholder="@lang('auth.placeholder.password_confirmation')" required autocomplete="new-password">
                        </div>

                        <div class="uk-margin">
                            <button class="uk-button uk-button-default button-primary uk-width-1-1" type="submit">@lang('auth.register.button')</button>
                        </div>

                        <div class="uk-margin">
                            @lang('auth.register.login_link_prefix') <a class="action-link" href="{{ route('login') }}">@lang('auth.register.login_link')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
