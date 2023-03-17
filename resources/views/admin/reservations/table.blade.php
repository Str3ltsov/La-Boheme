<div class="table table-responsive w-100" style="border: 0">
    <table class="table display text-light mb-3" id="reservations_table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Phone') }}</th>
                <th>{{ __('Coach') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Confirmation') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations ?? [] as $reservation)
                <tr id="row_link" data-href='url://'>
                    <td>{{ $reservation->client->name ?? '-' }}</td>
                    <td>
                        <a href="mailto:{{ $reservation->client->email }}" class="reservations-email">
                            {{ $reservation->client->email ?? '-' }}
                        </a>
                    </td>
                    <td>{{ $reservation->client->phone_number ?? '-' }}</td>
                    <td>
                        @if ($reservation->type->id == \App\Helpers\Constants::reservationTypeVyrtren)
                            {{ $reservation->vyrtren->first_name.' '.$reservation->vyrtren->last_name }}
                        @elseif ($reservation->type->id == \App\Helpers\Constants::reservationTypeVyrtrenass)
                            {{ $reservation->vyrtrenass->first_name.' '.$reservation->vyrtrenass->last_name }}
                        @elseif ($reservation->type->id == \App\Helpers\Constants::reservationTypeFiztren)
                            {{ $reservation->fiztren->first_name.' '.$reservation->fiztren->last_name }}
                        @endif
                    </td>
                    <td>{{ $reservation->created_at ? $reservation->created_at->format('Y-m-d') : '-' }}</td>
                    <td style="min-width: 410px">
                        @if ($reservation->status->id == \App\Helpers\Constants::reservationStatusInProgress)
                            @include('admin.reservations.form')
                        @else
                            <span>{{ __('Reservation status') }}:</span>
                            <span>
                                @if ($reservation->status->id == 2) {{ __('Approved') }}
                                @elseif ($reservation->status->id == 3) {{ __('Disapproved') }}
                                @elseif ($reservation->status->id == 4) {{ __('Absence') }}
                                @endif
                            </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="fw-bold text-light btn-hover-focus"
                           style="text-decoration: none">
                            <i class="fa-solid fa-eye" style="font-size: 1.1rem"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __('No reservations found') }}</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Coach') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Confirmation') }}</th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>

<style>
    .reservations-email {
        color: red;
        text-decoration: underline;
        transition: color 300ms ease;
    }

    .reservations-email:hover,
    .reservations-email:focus {
        color: #d20000;
    }
</style>

<script>
    window.onload = function() {
        $(document).ready( function () {
            $('#reservations_table').DataTable({
                responsive: true,
                "order": [5, 'asc']
            });
        });
    }
</script>
