@extends('layouts.app')

@section('title', trans('pages.books.index.title'))

@section('container')
    <div class="card-page">
        <div class="uk-card uk-card-default">
            <div class="uk-card-body">
                <h4 class="uk-card-title">@lang('pages.books.index.header')</h4>

                <div class="uk-overflow-auto">
                    @if ($books->total())
                        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-padding-small" uk-grid>
                            <div>
                                <form action="{{ route('books.index') }}" class="uk-search uk-search-default uk-width-1-1 uk-width-medium@s">
                                    <span uk-search-icon></span>
                                    <input class="uk-search-input" type="search" name="search" value="{{ request('search') }}" placeholder="@lang('validation.attributes.search')">
                                </form>
                            </div>
                            <div>
                                <div class="uk-flex uk-flex-right">
                                    <a href="{{ route('books.create') }}" class="uk-button button-primary uk-width-1-1 uk-width-auto@s">@lang('buttons.create')</a>
                                </div>
                            </div>
                        </div>

                        <div
                            class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-match uk-padding-small uk-flex-center"
                            uk-grid
                        >
                            @each('components.list.books.item', $books, 'book')
                        </div>

                        <div class="uk-flex uk-flex-right">
                            <form action="{{ route('books.index') }}">
                                <select class="uk-select uk-width-auto" name="limit" onchange="this.form.submit()">
                                    <option selected value="10">10</option>
                                    <option value="50" {{ conditionClass(request()->get('limit') == 50, 'selected') }}>50</option>
                                    <option value="100" {{ conditionClass(request()->get('limit') == 100, 'selected') }}>100</option>
                                </select>
                            </form>
                        </div>

                        {{ $books->appends(request()->all())->links() }}
                    @else
                        @include('components.list.books.empty')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
