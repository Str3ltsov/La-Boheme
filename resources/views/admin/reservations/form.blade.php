{!! Form::open([
    'route' => ['admin.reservations.updateReservationStatus'],
    'method' => 'put'
    ])!!}
    {{ Form::hidden('reservationId', $reservation->id) }}
    <div class="d-flex align-items-center" style="gap: 5px">
        <div>
            {{ Form::label('reservationStatus', __('Patvirtintas'), ['class' => 'form-check-label']) }}
            {{ Form::radio('reservationStatus', 2, false, ['class' => 'form-check-input']) }}
        </div>
        <div>
            {{ Form::label('reservationStatus', __('Nutrauktas'), ['class' => 'form-check-label']) }}
            {{ Form::radio('reservationStatus', 3, false, ['class' => 'form-check-input']) }}
        </div>
        <div>
            {{ Form::label('reservationStatus', __('Neatvykimas'), ['class' => 'form-check-label']) }}
            {{ Form::radio('reservationStatus', 4, false, ['class' => 'form-check-input']) }}
        </div>
        <div>
            {!! Form::button(__('Patvirtinti'), [
            'type' => 'submit',
            'class' => 'fw-bold',
            'style' => 'background-color: #C19F5F; border: none; border-radius: 17.5px; color: black; padding: 10px 0; width: 100px',
            'onclick' => __("return confirm('Ar jus tikrai norite tai padaryti?')")
            ]) !!}
        </div>
    </div>
{!! Form::close() !!}
