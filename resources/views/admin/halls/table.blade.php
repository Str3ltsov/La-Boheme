<div class="table table-responsive">
    <table class="table display text-light" id="halls_table">
        <thead>
        <tr>
            <th class="w-25" scope="col">{{ __('Id') }}</th>
            <th class="w-25" scope="col">{{ __('Sukurtas') }}</th>
            <th class="w-25" scope="col">{{ __('Atnaujintas') }}</th>
            <th class="w-auto" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($halls ?? [] as $hall)
            <tr>
                <td class="w-25" >{{ $hall->id ?? null}}</td>
                <td class="w-25" >{{ $hall->created_at ?? null}}</td>
                <td class="w-25" >{{ $hall->updated_at ?? null}}</td>
                <td class="w-auto">
                    <div class="d-flex align-items-center" style="gap: 20px">
                        <a href="{{ route('admin.halls.show', $hall->id) }}" class="fw-bold text-light"
                           style="background-color: transparent;
                           color: black; text-decoration: none">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        {!! Form::open(['route' => ['admin.halls.destroy', $hall->id], 'method' => 'delete']) !!}
                            <button type="submit", class="fw-bold fs-4 text-center text-light" style="background-color: transparent;
                                    border: none; text-decoration: none">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('No halls found') }}</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th class="w-25" scope="col">{{ __('Id') }}</th>
            <th class="w-25" scope="col">{{ __('Sukurtas') }}</th>
            <th class="w-25" scope="col">{{ __('Atnaujintas') }}</th>
            <th class="w-auto" scope="col"></th>
        </tr>
        </tfoot>
    </table>
</div>

<script>
    window.onload = function() {
        $(document).ready( function () {
            $('#halls_table').DataTable({
                responsive: true,
                "order": [0, 'asc'],
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
