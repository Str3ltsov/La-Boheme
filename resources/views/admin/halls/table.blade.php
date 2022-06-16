<div class="table table-responsive">
    <table class="table table-striped display" id="halls_table">
        <thead>
        <tr>
            <th class="w-25" scope="col">Id</th>
            <th class="w-25" scope="col">Sukurtas</th>
            <th class="w-25" scope="col">Atnaujintas</th>
            <th class="w-auto" scope="col">Veiksmai</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($halls ?? [] as $hall)
            <tr>
                <td class="w-25" >{{ $hall->id ?? null}}</td>
                <td class="w-25" >{{ $hall->created_at ?? null}}</td>
                <td class="w-25" >{{ $hall->updated_at ?? null}}</td>
                <td class="w-auto">
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('admin.halls.show', [$hall->id]) }}">Detaliai</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No halls found</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th class="w-25" scope="col">Id</th>
            <th class="w-25" scope="col">Sukurtas</th>
            <th class="w-25" scope="col">Atnaujintas</th>
            <th class="w-auto" scope="col">Veiksmai</th>
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
