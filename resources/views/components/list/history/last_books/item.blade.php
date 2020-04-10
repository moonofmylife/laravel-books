<tr>
    <td class="uk-text-nowrap table-image" uk-lightbox="animation: scale">
        <a class="uk-inline" href="{{ $rent->book->cover }}" data-caption="{{ $rent->book->name }}">
            <img src="{{ $rent->book->cover }}" width="50">
        </a>
    </td>
    <td class="uk-table-link">
        <a class="action-hover-link" href="{{ route('books.show', $rent->book) }}">{{ $rent->book->name }}</a>
    </td>
    <td class="uk-table-link">
        <a class="action-hover-link" href="{{ route('renters.show', $rent->renter) }}">{{ $rent->renter->fullname }}</a>
    </td>
    <td class="uk-text-nowrap">{{ $rent->updated_at }}</td>
    <td class="uk-text-nowrap">{{ $rent->expired_at }}</td>
</tr>
