<tr>
    <td><img class="uk-preserve-width uk-border-circle" src="{{ $renter->illustration }}" width="50" alt=""></td>
    <td class="uk-table-link">
        <a class="action-hover-link" href="{{ route('renters.show', $renter->id) }}">{{ $renter->fullname }}</a>
    </td>
    <td class="uk-text-nowrap">{{ $renter->email }}</td>
    <td class="uk-text-nowrap">{{ $renter->rents_total }}</td>
    <td class="uk-text-nowrap">{{ $renter->rents_active }}</td>
</tr>
