<div class="table table-responsive">
    <table class="table display text-light">
        <thead>
        <tr>
            <th class="w-25" scope="col">{{ __('Data') }}</th>
            <th class="w-25" scope="col">{{ __('Sukurtas') }}</th>
            <th class="w-25" scope="col">{{ __('Atnaujintas') }}</th>
            <th class="w-auto"></th>
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
                        'route' => ['admin.vyrtrenasss.deleteUnavailableDate', $table->id],
                        'method' => 'delete'
                        ]) !!}
                        {{ Form::hidden('unavailable_date_id', $unavailable_date->id) }}
                        <button type="submit", class="fw-bold fs-5 text-center text-light btn-hover-focus"
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
                <td colspan="4">{{ __('Nerasta nepasiekiamų datų') }}</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th class="w-25" scope="col">{{ __('Data') }}</th>
            <th class="w-25" scope="col">{{ __('Sukurtas') }}</th>
            <th class="w-25" scope="col">{{ __('Atnaujintas') }}</th>
            <th class="w-auto"></th>
        </tr>
        </tfoot>
    </table>
</div>
