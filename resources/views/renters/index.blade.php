@extends('layouts.app')

@section('title', trans('pages.renters.index.title'))

@section('container')
    <div class="card-page">
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top header-card-image">
                <img src="/images/illustrations/list.svg" alt="">
            </div>
            <div class="uk-card-body">
                <h4 class="uk-card-title">@lang('pages.renters.index.header')</h4>

                @if ($renters->total())
                    <div class="uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>
                        <div>
                            <form action="{{ route('renters.index') }}" class="uk-search uk-search-default uk-width-1-1 uk-width-medium@s">
                                <span uk-search-icon></span>
                                <input class="uk-search-input" type="search" name="search" value="{{ request('search') }}" placeholder="@lang('validation.attributes.search')">
                            </form>
                        </div>
                        <div>
                            <div class="uk-flex uk-flex-right">
                                <a href="{{ route('renters.create') }}" class="uk-button button-primary uk-width-1-1 uk-width-auto@s">@lang('buttons.create')</a>
                            </div>
                        </div>
                    </div>

                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                            <thead>
                            <tr>
                                <th class="uk-table-shrink"></th>
                                <th class="uk-width-small">@lang('models.renter.fullname')</th>
                                <th class="uk-table-shrink">@lang('models.renter.gender.field')</th>
                                <th class="uk-table-shrink">@lang('models.renter.email')</th>
                                <th class="uk-table-shrink">@lang('models.renter.updated_at')</th>
                                <th class="uk-table-shrink">@lang('models.renter.rents_total')</th>
                                <th class="uk-table-shrink">@lang('table.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @each('components.list.renters.item', $renters, 'renter')
                            </tbody>
                        </table>
                    </div>
                    <div class="uk-flex uk-flex-right">
                        <form action="{{ route('renters.index') }}">
                            <select class="uk-select uk-width-auto" name="limit" onchange="this.form.submit()">
                                <option selected value="10">10</option>
                                <option value="50" {{ conditionClass(request()->get('limit') == 50, 'selected') }}>50</option>
                                <option value="100" {{ conditionClass(request()->get('limit') == 100, 'selected') }}>100</option>
                            </select>
                        </form>
                    </div>

                    {{ $renters->appends(request()->all())->links() }}
                @else
                    @include('components.list.renters.empty')
                @endif
            </div>
        </div>
    </div>
@endsection
