@extends('layouts.app')

@section('title', trans('pages.renters.edit.title', [
    'user' => $renter->fullname
]))

@section('container')
    <div class="card-page">
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top header-card-image">
                <img src="/images/illustrations/edit.svg" alt="">
            </div>
            <div class="uk-card-body">
                <h4 class="uk-card-title">@lang('pages.renters.edit.header')</h4>

                <form method="POST" action="{{ route('renters.update', $renter) }}">
                    @method('PUT')
                    @csrf

                    <div class="uk-child-width-1-1 uk-child-width-1-2@m uk-grid-row-small grid-form" uk-grid>
                        <div>
                            <input class="uk-input @error('name') uk-form-danger @enderror" type="text" name="name" placeholder="@lang('pages.renters.placeholders.name')" value="{{ old('name', $renter->name) }}" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                            <input class="uk-input @error('lastname') uk-form-danger @enderror" type="text" name="lastname" placeholder="@lang('pages.renters.placeholders.lastname')" value="{{ old('lastname', $renter->lastname) }}" required>

                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                            <input class="uk-input @error('email') uk-form-danger @enderror" type="email" name="email" placeholder="@lang('pages.renters.placeholders.email')" value="{{ old('email', $renter->email) }}" required>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                            <select class="uk-select @error('gender') uk-form-danger @enderror" name="gender" required>
                                <option disabled selected hidden>@lang('pages.renters.placeholders.gender')</option>
                                <option value="male" {{ old('gender', $renter->gender) === 'male' ? 'selected' : '' }}> @lang('models.renter.gender.male') </option>
                                <option value="female" {{ old('gender', $renter->gender) === 'female' ? 'selected' : '' }}> @lang('models.renter.gender.female') </option>
                            </select>

                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <textarea class="uk-textarea @error('favorite_books') uk-form-danger @enderror" placeholder="@lang('pages.renters.placeholders.favorite_books')" name="favorite_books">{{ old('favorite_books', $renter->favorite_books) }}</textarea>

                            @error('favorite_books')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid-form-buttons">
                        <button class="uk-button button-primary" type="submit">@lang('buttons.create')</button>

                        <a href="{{ route('renters.destroy', $renter) }}"
                           class="uk-button uk-button-danger"
                           data-method="DELETE"
                           data-confirm="@lang('modal.confirm.alert.renter', [ 'renter' => $renter->fullname ])"
                           data-cancel="@lang('modal.confirm.cancel')"
                           data-ok="@lang('modal.confirm.ok')"
                        >
                            @lang('buttons.delete')
                        </a>

                        @if(url()->current() !== ($previous = url()->previous()))
                            <a href="{{ $previous }}" class="uk-button uk-button-default">@lang('buttons.back')</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
