<div class="table table-responsive" style="border: 0">
    <table class="table display text-light">
        <thead>
        <tr>
            <th width="300px" scope="col">{{ __('Datos laikas') }}</th>
            <th width="150px" scope="col">{{ __('Sukurtas') }}</th>
            <th width="150px" scope="col">{{ __('Atnaujintas') }}</th>
            <th width="50px"></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($unavailable_datetimes ?? [] as $unavailable_datetime)
            <tr>
                <td>{{ $unavailable_datetime->unavailable_datetime ?? null}}</td>
                <td>{{ $unavailable_datetime->created_at ?? null}}</td>
                <td>{{ $unavailable_datetime->updated_at ?? null}}</td>
                <td>
                    {!! Form::open([
                        'route' => ['admin.vyrtrens.deleteUnavailableDateTime', $table->id],
                        'method' => 'delete',
                        'style' => 'height: 30px'
                        ]) !!}
                        {{ Form::hidden('unavailable_datetime_id', $unavailable_datetime->id) }}
                        <button type="submit" class="fw-bold fs-5 text-center text-light btn-hover-focus"
                                style="background-color: transparent; border: none; border-radius: 5px; color: gray; padding: 10px 0; width: 50px; text-decoration: none"
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
        <tr>
            <th scope="col">{{ __('Datos laikas') }}</th>
            <th scope="col">{{ __('Sukurtas') }}</th>
            <th scope="col">{{ __('Atnaujintas') }}</th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>
