<div class="table table-responsive" style="border: 0">
    <table class="table display text-light" id="halls_table">
        <thead>
        <tr>
            <th class="w-25" scope="col">{{ __('ID') }}</th>
            <th class="w-25" scope="col">{{ __('Created') }}</th>
            <th class="w-25" scope="col">{{ __('Updated') }}</th>
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
                    <div style="display: flex; justify-content: center; align-items: center; width: 100%">
                        <a href="{{ route('admin.fiztren.show', $hall->id) }}" class="fw-bold btn-hover-focus"
                           style="background-color: transparent; color: gray; text-decoration: none">
                            <i class="fa-solid fa-eye text-dark"></i>
                        </a>
                        {!! Form::open(['route' => ['admin.fiztren.destroy', $hall->id], 'method' => 'delete', 'class' => 'm-0']) !!}
                            <button type="submit" class="fw-bold fs-4 text-center text-light btn-hover-focus ml-10" style="background-color: transparent; color: gray; border: none; text-decoration: none">
                                <i class="fa-solid fa-trash-can text-dark"></i>
                            </button>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('No physical training coaches found') }}</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th class="w-25" scope="col">{{ __('Id') }}</th>
            <th class="w-25" scope="col">{{ __('Created') }}</th>
            <th class="w-25" scope="col">{{ __('Updated') }}</th>
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
                "order": [0, 'asc']
            });
        });
    }
</script>
