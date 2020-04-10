@extends('layouts.app')

@section('title', trans('pages.history.active.title'))

@section('container')
    <div class="card-page">
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top header-card-image">
                <img src="/images/illustrations/list.svg" alt="">
            </div>
            <div class="uk-card-body">
                <h4 class="uk-card-title">@lang('pages.history.active.title')</h4>

                @if ($renters->isNotEmpty())
                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                            <thead>
                            <tr>
                                <th class="uk-table-shrink"></th>
                                <th class="uk-table-shrink">@lang('models.renter.fullname')</th>
                                <th class="uk-table-shrink">@lang('models.renter.email')</th>
                                <th class="uk-table-shrink">@lang('models.renter.rents_total')</th>
                                <th class="uk-table-shrink">@lang('models.renter.rents_active')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @each('components.list.history.active_readers.item', $renters, 'renter')
                            </tbody>
                        </table>
                    </div>
                @else
                    @include('components.list.history.active_readers.empty')
                @endif
            </div>
        </div>
    </div>
@endsection
