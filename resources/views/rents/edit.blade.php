@extends('layouts.app')

@section('title', trans('pages.rents.edit.title'))

@section('container')
    <div class="card-page">
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top header-card-image">
                <img src="/images/illustrations/business_deal.svg" alt="">
            </div>
            <div class="uk-card-body">
                <h4 class="uk-card-title">@lang('pages.rents.edit.header')</h4>

                <rent-form
                    method="POST"
                    class="grid-form"
                    action="{{ route('rents.update', $rent) }}"
                    renters-url="{{ route('renters.search') }}"
                    books-url="{{ route('books.search') }}"
                    @if ($rent)
                        :rent="{{ $rent }}"
                        :renter="{{ $rent->renter }}"
                        :book="{{ $rent->book }}"
                    @endif
                >
                    <template>
                        @csrf
                    </template>
                </rent-form>
            </div>
        </div>
    </div>
@endsection
