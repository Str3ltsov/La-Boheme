{!! Form::open([
    'route' => ['admin.reservations.updateReservationStatus'],
    'method' => 'put'
    ])!!}
    {{ Form::hidden('reservationId', $reservation->id) }}
    <div style="display: flex; align-items: flex-start; gap: 10px">
        <div>
            {{ Form::label('reservationStatus', __('Approved'), ['class' => 'form-check-label']) }}
            {{ Form::radio('reservationStatus', 2, false, ['class' => 'form-check-input']) }}
        </div>
        <div>
            {{ Form::label('reservationStatus', __('Disapproved'), ['class' => 'form-check-label']) }}
            {{ Form::radio('reservationStatus', 3, false, ['class' => 'form-check-input']) }}
        </div>
        <div>
            {{ Form::label('reservationStatus', __('Absence'), ['class' => 'form-check-label']) }}
            {{ Form::radio('reservationStatus', 4, false, ['class' => 'form-check-input']) }}
        </div>
        <div>
            {!! Form::button(__('Confirm'), [
            'type' => 'submit',
            'class' => 'fw-bold btn-hover-focus',
            'style' => 'background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 100px',
            'onclick' => __("return confirm('Are you sure you want to change the status of this reservation?')")
            ]) !!}
        </div>
    </div>
{!! Form::close() !!}
