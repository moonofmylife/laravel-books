@extends('layouts.app')

@section('title', trans('pages.books.create.title'))

@section('container')
    <div class="card-page">
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top header-card-image">
                <img src="/images/illustrations/book_creating.svg" alt="">
            </div>
            <div class="uk-card-body">
                <h4 class="uk-card-title">@lang('pages.books.create.header')</h4>

                <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="uk-child-width-1-1 uk-child-width-1-2@m uk-grid-row-small grid-form" uk-grid>
                        <div>
                            <input class="uk-input @error('name') uk-form-danger @enderror" type="text" name="name" placeholder="@lang('models.book.name')" value="{{ old('name') }}" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                            <input class="uk-input @error('author') uk-form-danger @enderror" type="text" name="author" placeholder="@lang('models.book.author')" value="{{ old('author') }}" required>

                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                            <div uk-form-custom="target: true" class="uk-width-expand">
                                <input class="uk-input" type="file" name="cover">
                                <input class="uk-input" type="text" placeholder="@lang('models.book.cover')">
                            </div>

                            @error('cover')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                            <input class="uk-input @error('year') uk-form-danger @enderror" type="text" name="year" placeholder="@lang('models.book.year')" value="{{ old('year') }}" required>

                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                            <input class="uk-input @error('pages') uk-form-danger @enderror" type="number" name="pages" placeholder="@lang('models.book.pages')" value="{{ old('pages') }}" required>

                            @error('pages')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                            <input class="uk-input @error('age_limit') uk-form-danger @enderror" type="number" name="age_limit" placeholder="@lang('models.book.age_limit')" value="{{ old('age_limit') }}" required>

                            @error('age_limit')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                            <input class="uk-input @error('cost') uk-form-danger @enderror" type="number" name="cost" placeholder="@lang('models.book.cost')" value="{{ old('cost') }}" required>

                            @error('cost')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <textarea class="uk-textarea @error('description') uk-form-danger @enderror" placeholder="@lang('models.book.description')" name="description">{{ old('description') }}</textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                    <strong class="uk-text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="grid-form-buttons">
                            <button class="uk-button button-primary" type="submit">@lang('buttons.save')</button>

                            @if(url()->current() !== ($previous = url()->previous()))
                                <a href="{{ $previous }}" class="uk-button uk-button-default">@lang('buttons.back')</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
