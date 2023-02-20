<div class="table table-responsive w-100" style="border: 0">
    <table class="table display text-light mb-3" id="reservations_table">
        <thead>
            <tr>
                <th>{{ __('Vardas') }}</th>
                <th>{{ __('El. pastas') }}</th>
                <th>{{ __('Telefonas') }}</th>
                <th>{{ __('Data ir laikas') }}</th>
                <th>{{ __('Zmoniu sk.') }}</th>
                <th>{{ __('Patvirtinimas') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations ?? [] as $reservation)
                <tr id="row_link" data-href='url://'>
                    <td>{{ $reservation->name ?? '-' }}</td>
                    <td>{{ $reservation->email ?? '-' }}</td>
                    <td>{{ $reservation->phone_number ?? '-' }}</td>
                    <td data-class-name="priority">{{ $reservation->start_datetime ?? '-' }}</td>
                    <td>{{ $reservation->number_of_people ?? '-' }}</td>
                    <td>
                        @if ($reservation->status->id == 1)
                            @include('admin.reservations.form')
                        @else
                            <span>{{ __('Reservacijos statusas yra') }}: {{ $reservation->status->name ?? '-' }}</span>
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
                    <td colspan="7">{{ __('Nerasta rezervacijų') }}</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th>{{ __('Vardas') }}</th>
            <th>{{ __('El. pastas') }}</th>
            <th>{{ __('Telefonas') }}</th>
            <th>{{ __('Data ir laikas') }}</th>
            <th>{{ __('Zmoniu sk.') }}</th>
            <th>{{ __('Patvirtinimas') }}</th>
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
                "order": [5, 'asc'],
                "language": {
                    "emptyTable": "Lentelėje duomenų nėra",
                    "info": "Rodoma _START_ iki _END_ po _TOTAL_ įrašų",
                    "infoEmpty": "Rodoma 0 iki 0 po 0 įrašų",
                    "infoFiltered": "(filtruojama iš _MAX_ įrašų)",
                    "infoThousands": ",",
                    "lengthMenu": "Rodoma po _MENU_ įrašų",
                    "loadingRecords": "Pakrovimas...",
                    "processing": "Apdorojimas...",
                    "search": "Paieska: ",
                    "zeroRecords": "Atitinkančių įrašų nerasta",
                    "thousands": ",",
                    "paginate": {
                        "first": "Pirmas",
                        "previous": "Ankstesnis",
                        "next": "Kitas",
                        "last": "Paskutinis"
                    }
                }
            });
        });
    }
</script>
