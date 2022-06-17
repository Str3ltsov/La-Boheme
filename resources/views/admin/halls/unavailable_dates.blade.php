<div class="table table-responsive">
    <table class="table table-striped display">
        <thead>
        <tr>
            <th class="w-25" scope="col">{{ __('Data') }}</th>
            <th class="w-25" scope="col">{{ __('Sukurtas') }}</th>
            <th class="w-25" scope="col">{{ __('Atnaujintas') }}</th>
            <th class="w-auto">{{ __('Veiksmai') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($unavailable_dates ?? [] as $unavailable_date)
            <tr>
                <td class="w-25" >{{ $unavailable_date->unavailable_date->format('Y-m-d') ?? null}}</td>
                <td class="w-25" >{{ $unavailable_date->created_at ?? null}}</td>
                <td class="w-25" >{{ $unavailable_date->updated_at ?? null}}</td>
                <td class="w-auto">
                    {!! Form::open([
                        'route' => ['admin.halls.deleteUnavailableDate', $hall->id],
                        'method' => 'delete'
                        ]) !!}
                        {{ Form::hidden('unavailable_date_id', $unavailable_date->id) }}
                        {!! Form::button(__('Ištrinti'), [
                            'type' => 'submit',
                            'class' => 'btn btn-danger',
                            'onclick' => "return confirm('Ar jus tikrai norite?')"
                            ]) !!}
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
            <th class="w-25" scope="col">{{ __('Data') }}</th>
            <th class="w-25" scope="col">{{ __('Sukurtas') }}</th>
            <th class="w-25" scope="col">{{ __('Atnaujintas') }}</th>
            <th class="w-auto">{{ __('Veiksmai') }}</th>
        </tr>
        </tfoot>
    </table>
</div>
