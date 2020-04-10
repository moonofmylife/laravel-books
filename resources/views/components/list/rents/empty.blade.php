<div class="uk-width-expand empty-list">
    <p class="uk-placeholder">
        @lang('pages.renters.show.empty_label')

        <a href="{{ route('rents.create', ['renter' => $renter]) }}" class="uk-button uk-button-text ">
            @lang('pages.renters.show.empty_label_link')
        </a>
    </p>
</div>
