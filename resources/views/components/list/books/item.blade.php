<div>
    <div class="uk-card uk-card-default">
        <div class="uk-card-media-top book-cover">
            <a href="{{ route('books.show', $book) }}">
                <img src="{{ $book->cover }}" alt="">
            </a>
        </div>
        <div class="uk-card-body card-resource">
            <ul class="uk-iconnav">
                <li>
                    <a
                        class="uk-button uk-button-link"
                        href="{{ route('rents.create', [ 'book' => $book ]) }}"
                        uk-icon="icon: cart; ratio: .8"
                        uk-tooltip="@lang('buttons.rent')"
                    >
                    </a>
                </li>

                <li>
                    <a
                        class="uk-button uk-button-link"
                        href="{{ route('books.destroy', $book) }}"
                        data-method="DELETE"
                        data-confirm="@lang('modal.confirm.alert.book', [ 'book' => $book->name ])"
                        data-cancel="@lang('modal.confirm.cancel')"
                        data-ok="@lang('modal.confirm.ok')"
                        uk-icon="icon: trash; ratio: .8"
                        uk-tooltip="@lang('buttons.delete')"
                    >
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('books.edit', $book) }}"
                        class="uk-button uk-button-link"
                        uk-icon="icon: pencil; ratio: .8"
                        uk-tooltip="@lang('buttons.edit')"
                    >
                    </a>
                </li>
            </ul>
            <p class="card-resource-description">{{ $book->author }}</p>
            <a class="action-link" href="{{ route('books.show', $book) }}">
                <p class="card-resource-title">{{ $book->name }}</p>
            </a>
        </div>
    </div>
</div>
