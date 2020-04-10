<tr>
    <td class="uk-text-nowrap table-image" uk-lightbox="animation: scale">
        <a class="uk-inline" href="{{ $rent->book->cover }}" data-caption="{{ $rent->book->name }}">
            <img src="{{ $rent->book->cover }}" width="100">
        </a>
    </td>
    <td class="uk-table-link">
        <a class="action-hover-link" href="{{ route('books.show', $rent->book) }}">{{ $rent->book->name }}</a>
    </td>
    <td class="uk-text-nowrap">{{ $rent->book->author }}</td>
    <td class="uk-text-nowrap">{{ $rent->updated_at }}</td>
    <td class="uk-text-nowrap">{{ $rent->expired_at }}</td>
    <td class="uk-text-nowrap">{{ $rent->deposit }}</td>
    <td class="uk-text-nowrap">
        <ul class="uk-iconnav">
            <li>
                <a
                    class="uk-button uk-button-link"
                    href="{{ route('rents.destroy', $rent) }}"
                    data-method="DELETE"
                    data-confirm="@lang('modal.confirm.alert.rent', [
                        'book' => $rent->book->name,
                        'renter' => $rent->renter->fullname
                    ])"
                    data-cancel="@lang('modal.confirm.cancel')"
                    data-ok="@lang('modal.confirm.ok')"
                    uk-icon="icon: trash; ratio: .8"
                    uk-tooltip="@lang('buttons.delete')"
                >
                </a>
            </li>

            <li>
                <a
                    href="{{ route('rents.edit', $rent) }}"
                    class="uk-button uk-button-link"
                    uk-icon="icon: pencil; ratio: .8"
                    uk-tooltip="@lang('buttons.edit')"
                >
                </a>
            </li>
        </ul>
    </td>
</tr>
