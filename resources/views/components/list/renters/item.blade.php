<tr>
    <td><img class="uk-preserve-width uk-border-circle" src="{{ $renter->illustration }}" width="50" alt=""></td>
    <td class="uk-table-link">
        <a class="action-hover-link" href="{{ route('renters.show', $renter->id) }}">{{ $renter->fullname }}</a>
    </td>
    <td class="uk-text-nowrap">{{ $renter->gender_name }}</td>
    <td class="uk-text-nowrap">{{ $renter->email }}</td>
    <td class="uk-text-nowrap">{{ $renter->updated_at }}</td>
    <td class="uk-text-nowrap">{{ $renter->rents_total }}</td>
    <td class="uk-text-nowrap">
        <ul class="uk-iconnav">
            <li>
                <a
                    class="uk-button uk-button-link"
                    href="{{ route('renters.destroy', $renter) }}"
                    data-method="DELETE"
                    data-confirm="@lang('modal.confirm.alert.renter', [ 'renter' => $renter->fullname ])"
                    data-cancel="@lang('modal.confirm.cancel')"
                    data-ok="@lang('modal.confirm.ok')"
                    uk-icon="icon: trash; ratio: .8"
                    uk-tooltip="@lang('buttons.delete')"
                >
                </a>
            </li>

            <li>
                <a
                    href="{{ route('renters.edit', $renter) }}"
                    class="uk-button uk-button-link"
                    uk-icon="icon: pencil; ratio: .8"
                    uk-tooltip="@lang('buttons.edit')"
                >
                </a>
            </li>
        </ul>
    </td>
</tr>
