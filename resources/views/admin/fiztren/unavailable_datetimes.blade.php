<div class="table table-responsive" style="border: 0">
    <table class="table display text-light">
        <thead>
        <tr>
            <th width="300px" scope="col">{{ __('Date time') }}</th>
            <th width="150px" scope="col">{{ __('Created') }}</th>
            <th width="150px" scope="col">{{ __('Updated') }}</th>
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
                        'route' => ['admin.fiztren.deleteUnavailableDateTime', $hall->id],
                        'method' => 'delete',
                        'style' => 'height: 30px'
                        ]) !!}
                        {{ Form::hidden('unavailable_datetime_id', $unavailable_datetime->id) }}
                        <button type="submit" class="fw-bold fs-5 text-center text-light btn-hover-focus"
                                style="background-color: transparent; border: none; border-radius: 5px; color: gray; padding: 10px 0; width: 50px; text-decoration: none"
                                onclick="return confirm('Are you sure you want to add this unavailable date time')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('No unavailable date times found') }}</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th class="w-25" scope="col">{{ __('Date time') }}</th>
            <th class="w-25" scope="col">{{ __('Created') }}</th>
            <th class="w-25" scope="col">{{ __('Updated') }}</th>
            <th class="w-auto"></th>
        </tr>
        </tfoot>
    </table>
</div>
