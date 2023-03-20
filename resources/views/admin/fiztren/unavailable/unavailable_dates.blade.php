<div class="table table-responsive" style="border: 0">
    <table class="table display text-light">
        <thead>
        <tr>
            <th width="300px" scope="col">{{ __('Date') }}</th>
            <th width="150px" scope="col">{{ __('Created') }}</th>
            <th width="150px" scope="col">{{ __('Updated') }}</th>
            <th width="50px"></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($unavailable_dates ?? [] as $unavailable_date)
            <tr>
                <td>{{ $unavailable_date->unavailable_date->format('Y-m-d') ?? null}}</td>
                <td>{{ $unavailable_date->created_at ?? null}}</td>
                <td>{{ $unavailable_date->updated_at ?? null}}</td>
                <td>
                    {!! Form::open([
                        'route' => ['admin.fiztren.deleteUnavailableDate', $coach->id],
                        'method' => 'delete',
                        'style' => 'height: 30px'
                        ]) !!}
                        {{ Form::hidden('unavailable_date_id', $unavailable_date->id) }}
                        <button type="submit" class="fw-bold fs-5 text-center text-light btn-hover-focus"
                                style="background-color: transparent; border: none; border-radius: 5px; color: gray; padding: 10px 0; width: 50px; text-decoration: none"
                                onclick="return confirm('Are you sure you want to add this unavailable date')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">{{ __('No unavailable dates found') }}</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th scope="col">{{ __('Date') }}</th>
            <th scope="col">{{ __('Created') }}</th>
            <th scope="col">{{ __('Updated') }}</th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>
