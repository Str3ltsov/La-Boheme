<div class="table table-responsive" style="border: 0">
    <table class="table display text-light mb-3" id="tables_table">
        <thead>
        <tr>
            <th class="w-25" scope="col">{{ __('ID') }}</th>
            <th class="w-50" scope="col">{{ __('Name') }}</th>
            <th class="w-25" scope="col">{{ __('Rating') }}</th>
            <th class="w-25" scope="col">{{ __('Available') }}</th>
            <th class="w-25" scope="col">{{ __('Created') }}</th>
            <th class="w-25" scope="col">{{ __('Updated') }}</th>
            <th class="w-auto" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($assistants ?? [] as $assistant)
            <tr>
                <td class="w-25" >{{ $assistant->id }}</td>
                <td class="w-50" >{{ $assistant->first_name.' '.$assistant->last_name }}</td>
                <td class="w-25">
                    <div style="display: flex; align-items: center">
                        <span>{{ round($assistant->averageRating, 2) ?? 0 }}</span>
                        <span>/</span>
                        <span>5</span>
                        @if ($assistant->averageRating > 0)
                            <i class="fa-solid fa-star ml-5" style="color: #f8ae00"></i>
                        @else
                            <i class="fa-regular fa-star ml-5" style="color: #f8ae00"></i>
                        @endif
                    </div>
                </td>
                <td class="w-25" >{{ $assistant->available ? __('Yes') : __('No') }}</td>
                <td class="w-25" >{{ $assistant->created_at ?? '-' }}</td>
                <td class="w-25" >{{ $assistant->updated_at ?? '-' }}</td>
                <td class="w-auto">
                    <div style="display: flex; justify-content: center; align-items: center; width: 100%; gap: 10px">
                        <a href="{{ route('vyrtrenasss.show', $assistant->id) }}" class="fw-bold btn-hover-focus" style="background-color: transparent; color: gray;; text-decoration: none">
                            <i class="fa-solid fa-eye text-dark fs-5"></i>
                        </a>
                        <a href="{{ route('vyrtrenasss.edit', $assistant->id) }}" class="fw-bold btn-hover-focus" style="background-color: transparent; color: gray;; text-decoration: none">
                            <i class="fa-solid fa-pen-to-square text-dark ml-5 fs-5"></i>
                        </a>
                        {!! Form::open(['route' => ['vyrtrenasss.destroy', $assistant->id], 'method' => 'delete', 'class' => 'm-0']) !!}
                            <button type="submit" class="fw-bold text-center btn-hover-focus" style="background-color: transparent; color: gray; border: none; text-decoration: none"
                                    onclick="{{ __("return confirm('Are you sure you want to delete this head coach assistant?')") }}">
                                <i class="fa-solid fa-trash-can text-dark fs-5"></i>
                            </button>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('No head coach assistants found') }}</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th class="w-25" scope="col">{{ __('ID') }}</th>
            <th class="w-50" scope="col">{{ __('Name') }}</th>
            <th class="w-25" scope="col">{{ __('Rating') }}</th>
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
