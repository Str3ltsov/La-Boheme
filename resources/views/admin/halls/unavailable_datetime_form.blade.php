{!! Form::open([
    'route' => ['admin.halls.createUnavailableDateTime', $hall->id],
    'method' => 'post'
    ]) !!}
    <input type="hidden" name="hall_id" value="{{ $hall->id }}">
    <div class="w-100 d-flex align-items-center my-3">
        <label for="unavailable_date" class="form-label w-25 fs-4">{{ __('Data') }}:</label>
        <input
            type="datetime-local" name="unavailable_datetime"
            class="form-control fs-4 bg-transparent text-light"
            style="border-radius: 15px; border-color: #C19F5F"
            min="{{ now()->format('Y-m-d') }}T12:00" max="{{ now()->addMonths(3)->format('Y-m-d') }}T00:00"
        >
    </div>
    <div class="d-flex justify-content-end align-items-center mt-2" style="gap: 10px">
        <button type="reset" class="fw-bold fs-4 text-center py-2 px-4"
                style="background-color: #BBBBBB; border: none; border-radius: 17.5px"
                onclick="document.location='{{ redirect()->back() }}'">
            {{ __('Nuvalyti') }}
        </button>
        {!! Form::button(__('Sukurti'), [
            'type' => 'submit',
            'class' => 'fw-bold fs-4 text-center py-2 px-4',
            'style' => 'background-color: #C19F5F; border: none; border-radius: 17.5px'
            ]) !!}
    </div>
{!! Form::close() !!}
