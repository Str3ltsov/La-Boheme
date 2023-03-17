<div class="table table-responsive" style="border: 0">
    <table class="table display text-light mb-3" id="tables_table">
        <thead>
        <tr>
            <th class="w-25" scope="col">{{ __('ID') }}</th>
            <th class="w-50" scope="col">{{ __('Name') }}</th>
            <th class="w-25" scope="col">{{ __('Available') }}</th>
            <th class="w-25" scope="col">{{ __('Created') }}</th>
            <th class="w-25" scope="col">{{ __('Updated') }}</th>
            <th class="w-auto" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($coaches as $coach)
            <tr>
                <td class="w-25" >{{ $coach->id }}</td>
                <td class="w-50" >{{ $coach->first_name.' '.$coach->last_name }}</td>
                <td class="w-25" >{{ $coach->available ? __('Yes') : __('No') }}</td>
                <td class="w-25" >{{ $coach->created_at ?? '-' }}</td>
                <td class="w-25" >{{ $coach->updated_at ?? '-' }}</td>
                <td class="w-auto">
                    <div style="display: flex; justify-content: center; align-items: center; width: 100%; gap: 10px">
                        <a href="{{ route('vyrtrens.show', $coach->id) }}" class="fw-bold btn-hover-focus" style="background-color: transparent; color: gray;; text-decoration: none">
                            <i class="fa-solid fa-eye text-dark fs-5"></i>
                        </a>
                        <a href="{{ route('vyrtrens.edit', $coach->id) }}" class="fw-bold btn-hover-focus" style="background-color: transparent; color: gray;; text-decoration: none">
                            <i class="fa-solid fa-pen-to-square text-dark ml-5 fs-5"></i>
                        </a>
                        {!! Form::open(['route' => ['vyrtrens.destroy', $coach->id], 'method' => 'delete', 'class' => 'm-0']) !!}
                            <button type="submit" class="fw-bold text-center btn-hover-focus" style="background-color: transparent; color: gray; border: none; text-decoration: none">
                                <i class="fa-solid fa-trash-can text-dark fs-5"></i>
                            </button>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('No head coaches found') }}</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th class="w-25" scope="col">{{ __('ID') }}</th>
            <th class="w-50" scope="col">{{ __('Name') }}</th>
            <th class="w-25" scope="col">{{ __('Available') }}</th>
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
            $('#tables_table').DataTable({
                responsive: true,
                "order": [0, 'asc']
            });
        });
    }
</script>
