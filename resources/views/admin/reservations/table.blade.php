<div class="table table-responsive w-100" style="border: 0">
    <table class="table display text-light mb-3" id="reservations_table">
        <thead>
            <tr>
                <th>{{ __('Reservation type') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Phone') }}</th>
                <th>{{ __('Confirmation') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations ?? [] as $reservation)
                <tr id="row_link" data-href='url://'>
                    <td>{{ $reservation->type->name ?? '-' }}</td>
                    <td>{{ $reservation->name ?? '-' }}</td>
                    <td>{{ $reservation->email ?? '-' }}</td>
                    <td>{{ $reservation->phone_number ?? '-' }}</td>
                    <td>
                        @if ($reservation->status->id == 1)
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
                            <i class="fa-solid fa-eye"></i>
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
            <th>{{ __('Reservation type') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Phone') }}</th>
            <th>{{ __('Confirmation') }}</th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>

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
