<div class="table table-responsive">
    <table class="table display text-light">
        <thead>
        <tr>
            <th class="w-25" scope="col">{{ __('Datos laikas') }}</th>
            <th class="w-25" scope="col">{{ __('Sukurtas') }}</th>
            <th class="w-25" scope="col">{{ __('Atnaujintas') }}</th>
            <th class="w-auto"></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($unavailable_datetimes ?? [] as $unavailable_datetime)
            <tr>
                <td class="w-25" >{{ $unavailable_datetime->unavailable_datetime ?? null}}</td>
                <td class="w-25" >{{ $unavailable_datetime->created_at ?? null}}</td>
                <td class="w-25" >{{ $unavailable_datetime->updated_at ?? null}}</td>
                <td class="w-auto">
                    {!! Form::open([
                        'route' => ['admin.halls.deleteUnavailableDateTime', $hall->id],
                        'method' => 'delete'
                        ]) !!}
                        {{ Form::hidden('unavailable_datetime_id', $unavailable_datetime->id) }}
                        <button type="submit", class="fw-bold fs-5 text-center text-light"
                                style="background-color: transparent; border: none; border-radius: 17.5px; color: black;
                                    padding: 10px 0; width: 50px; text-decoration: none"
                                onclick="return confirm('Ar jus tikrai norite?')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('Nerasta nepasiekiamų datos laikų') }}</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th class="w-25" scope="col">{{ __('Datos laikas') }}</th>
            <th class="w-25" scope="col">{{ __('Sukurtas') }}</th>
            <th class="w-25" scope="col">{{ __('Atnaujintas') }}</th>
            <th class="w-auto"></th>
        </tr>
        </tfoot>
    </table>
</div>
