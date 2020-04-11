@extends('layouts.app')

@section('title', "{$book->author}, {$book->name}")

@section('container')
    <div class="card-page book-show-page">
        <div class="uk-card uk-card-default">
            <div class="uk-card-body">
                <div class="uk-flex uk-flex-right uk-margin-medium-right inline-list">
                    <a
                        class="uk-button button-primary"
                        href="{{ route('rents.create', [
                            'book' => $book
                        ]) }}"
                    >
                        @lang('buttons.rent')
                    </a>
                    <a
                        class="uk-button uk-button-danger"
                        href="{{ route('books.destroy', $book) }}"
                        data-method="DELETE"
                        data-confirm="@lang('modal.confirm.alert.book', [ 'book' => $book->name ])"
                        data-cancel="@lang('modal.confirm.cancel')"
                        data-ok="@lang('modal.confirm.ok')"
                    >
                        @lang('buttons.delete')
                    </a>

                    <a
                        class="uk-button uk-button-default"
                        href="{{ route('books.edit', $book) }}"
                    >
                        @lang('buttons.edit')
                    </a>
                </div>

                <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-grid-row-small uk-padding-small" uk-grid>
                    <div class="uk-width-medium">
                        <img class="book-cover" src="{{ $book->cover }}" alt="">
                    </div>
                    <div>
                        <h3 class="book-name">{{ $book->name }}</h3>
                        <hr>
                        <p class="book-author">
                            <strong>@lang('models.book.author'):</strong> <a class="action-link" href="#">{{ $book->author }}</a>
                        </p>

                        <div class="book-details">
                            <h5 class="uk-text-bold">@lang('pages.books.show.detailed_info')</h5>
                            <ul class="list-key-value">
                                <li><strong>@lang('models.book.pages'): </strong> <span>{{ $book->pages }}</span></li>
                                <li><strong>@lang('models.book.age_limit'): </strong> <span>{{ $book->age_limit }}+</span></li>
                                <li><strong>@lang('models.book.year'): </strong> <span>{{ $book->year }}</span></li>
                                <li><strong>@lang('models.book.cost'): </strong> <span>{{ $book->cost }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                @if ($book->description)
                    <div class="uk-width-1-1 uk-grid book-description">
                        <h4 class="uk-text-bold">@lang('models.book.description'):</h4>
                        <p class="uk-margin">{!! $book->description !!}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
