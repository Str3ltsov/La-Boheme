<div class="table table-responsive">
    <table class="table display text-light mb-3" id="tables_table">
        <thead>
        <tr>
            <th class="w-25" scope="col">{{ __('ID') }}</th>
            <th class="w-25" scope="col">{{ __('Sukurtas') }}</th>
            <th class="w-25" scope="col">{{ __('Atnaujintas') }}</th>
            <th class="w-auto" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($tables ?? [] as $table)
            <tr>
                <td class="w-25" >{{ $table->id ?? null}}</td>
                <td class="w-25" >{{ $table->created_at ?? null}}</td>
                <td class="w-25" >{{ $table->updated_at ?? null}}</td>
                <td class="w-auto">
                    <div class="d-flex align-items-center" style="gap: 20px">
                        <a href="{{ route('admin.vyrtrenasss.show', $table->id) }}" class="fw-bold text-light btn-hover-focus"
                           style="background-color: transparent; color: white; text-decoration: none">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        {!! Form::open(['route' => ['admin.vyrtrenasss.destroy', $table->id], 'method' => 'delete']) !!}
                            <button type="submit", class="fw-bold fs-4 text-center text-light btn-hover-focus" style="background-color: transparent;
                                        border: none; text-decoration: none">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('Nerasta lentelių') }}</td>
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
            $('#tables_table').DataTable({
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
