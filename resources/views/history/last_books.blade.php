@extends('layouts.app')

@section('title', trans('pages.history.books.title'))

@section('container')
    <div class="card-page">
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top header-card-image">
                <img src="/images/illustrations/book_shelves.svg" alt="">
            </div>
            <div class="uk-card-body">
                <h4 class="uk-card-title">@lang('pages.history.books.title')</h4>

                <div class="uk-flex uk-flex-right uk-margin">
                    <a href="{{ route('rents.create') }}" class="uk-button button-primary uk-width-1-1 uk-width-auto@s">@lang('buttons.rent')</a>
                </div>

                @if ($rents->isNotEmpty())
                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                            <thead>
                            <tr>
                                <th class="uk-table-shrink"></th>
                                <th class="uk-width-small">@lang('models.book.name')</th>
                                <th class="uk-width-small">@lang('models.renter.fullname')</th>
                                <th class="uk-table-shrink">@lang('models.rent.rented_at')</th>
                                <th class="uk-table-shrink">@lang('models.rent.expired_at')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @each('components.list.history.last_books.item', $rents, 'rent')
                            </tbody>
                        </table>
                    </div>
                @else
                    @include('components.list.history.last_books.empty')
                @endif
            </div>
        </div>
    </div>
@endsection
