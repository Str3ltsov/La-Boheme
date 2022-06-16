<div class="table table-responsive">
    <table class="table table-striped display">
        <thead>
        <tr>
            <th class="w-25" scope="col">Datos laikas</th>
            <th class="w-25" scope="col">Sukurtas</th>
            <th class="w-25" scope="col">Atnaujintas</th>
            <th class="w-auto">Veiksmai</th>
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
                        'route' => ['admin.tables.deleteUnavailableDateTime', $table->id],
                        'method' => 'delete'
                        ]) !!}
                        {{ Form::hidden('unavailable_datetime_id', $unavailable_datetime->id) }}
                        {!! Form::button('Ištrinti', [
                            'type' => 'submit',
                            'class' => 'btn btn-danger',
                            'onclick' => "return confirm('Ar jus tikrai norite?')"
                            ]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No unavailable date times found</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th class="w-25" scope="col">Datos laikas</th>
            <th class="w-25" scope="col">Sukurtas</th>
            <th class="w-25" scope="col">Atnaujintas</th>
            <th class="w-auto">Veiksmai</th>
        </tr>
        </tfoot>
    </table>
</div>
