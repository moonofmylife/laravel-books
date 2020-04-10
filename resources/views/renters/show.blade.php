@extends('layouts.app')

@section('title', $renter->fullname)

@section('container')
    <div class="card-page">
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top header-card-image">
                <img src="/images/illustrations/personal_page.svg" alt="">
            </div>

            <div class="uk-card-body">
                <div class="uk-flex uk-flex-right uk-margin-medium inline-list">
                    <a
                        class="uk-button uk-button-danger"
                        href="{{ route('renters.destroy', $renter) }}"
                        data-method="DELETE"
                        data-confirm="@lang('modal.confirm.alert.renter', [ 'renter' => $renter->fullname ])"
                        data-cancel="@lang('modal.confirm.cancel')"
                        data-ok="@lang('modal.confirm.ok')"
                    >
                        @lang('buttons.delete')
                    </a>

                    <a
                        class="uk-button uk-button-default"
                        href="{{ route('renters.edit', $renter) }}"
                    >
                        @lang('buttons.edit')
                    </a>
                </div>

                <div class="uk-child-width-auto uk-grid-collapse uk-flex-items-center renter-info" uk-grid>
                    <div class="renter-info-illustration">
                        <img class="uk-border-pill uk-margin-small-left" src="{{ $renter->illustration }}" width="50" height="40" alt="Border pill">
                    </div>
                    <div class="renter-info-data">
                        <h4 class="renter-info-data-name">{{ $renter->fullname }} <i uk-icon="{{ $renter->gender }}" uk-tooltip="{{ $renter->gender_name }}"></i></h4>
                        <small class="renter-info-data-email">{{ $renter->email }}</small>
                    </div>
                </div>

                <hr class="uk-divider-icon">

                <div class="uk-child-width-auto">
                    <div class="renter-info-other">
                        <div class="uk-child-width-1-1">
                            <div class="uk-flex-inline">
                                <h4>@lang('models.renter.updated_at'):</h4> <small class="uk-text-lighter">{{ $renter->updated_at }}</small>
                            </div>
                            <div {{ conditionClass(!$renter->favorite_books, 'uk-flex-inline', true) }}>
                                <h4>@lang('models.renter.favorite_books.field'):</h4>

                                @if($renter->favorite_books)
                                    <div class="favorite-books">
                                        <article class="uk-comment uk-comment-primary">
                                            <div class="uk-comment-body">
                                                <p>{!! $renter->favorite_books !!}</p>
                                            </div>
                                        </article>
                                    </div>
                                @else
                                    <small class="uk-text-lighter uk-inline">@lang('models.renter.favorite_books.empty')</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="uk-text-bold uk-text-center">@lang('pages.renters.show.rented_books')</h4>

                @if ($rents->total())
                    <div class="uk-flex uk-flex-right">
                        <a href="{{ route('rents.create', ['renter' => $renter]) }}" class="uk-button button-primary">@lang('buttons.rent')</a>
                    </div>

                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                            <thead>
                                <tr>
                                    <th class="uk-table-shrink"></th>
                                    <th class="uk-width-small">@lang('models.book.name')</th>
                                    <th class="uk-width-small">@lang('models.book.author')</th>
                                    <th class="uk-table-shrink">@lang('models.rent.rented_at')</th>
                                    <th class="uk-table-shrink">@lang('models.rent.expired_at')</th>
                                    <th class="uk-table-shrink">@lang('models.rent.deposit')</th>
                                    <th class="uk-table-shrink">@lang('table.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @each('components.list.rents.item', $rents, 'rent')
                            </tbody>
                        </table>
                    </div>
                    <div class="uk-flex uk-flex-right">
                        <form action="{{ route('renters.show', $renter) }}">
                            <select class="uk-select uk-width-auto" name="limit" onchange="this.form.submit()">
                                <option selected value="10">10</option>
                                <option value="50" {{ conditionClass(request()->get('limit') === 50, 'selected') }}>50</option>
                                <option value="100" {{ conditionClass(request()->get('limit') === 100, 'selected') }}>100</option>
                            </select>
                        </form>
                    </div>

                    {{ $rents->appends(request()->all())->links() }}
                @else
                    @include('components.list.rents.empty')
                @endif


            </div>
        </div>
    </div>
@endsection
