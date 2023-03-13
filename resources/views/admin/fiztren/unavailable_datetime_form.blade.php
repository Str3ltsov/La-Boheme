{!! Form::open([
    'route' => ['admin.fiztren.createUnavailableDateTime', $hall->id],
    'method' => 'post'
    ]) !!}
    <input type="hidden" name="fiztren_id" value="{{ $hall->id }}">
    <div class="w-100 d-flex align-items-center my-3">
        <label for="unavailable_date" class="form-label w-25 fs-4">{{ __('Date time') }}:</label>
        <input
            type="datetime-local" name="unavailable_datetime"
            class="form-control fs-4 bg-transparent text-light"
            style="border-radius: 5px; border-color: #C19F5F"
            min="{{ now()->format('Y-m-d') }}T12:00" max="{{ now()->addMonths(3)->format('Y-m-d') }}T00:00"
        >
    </div>
    <div class="d-flex justify-content-end align-items-center mt-20">
        <button type="reset" class="fw-bold fs-4 text-center pl-20 pr-20 pt-5 pb-5 btn-hover-focus"
                style="background-color: #dfdfdf; border: none; border-radius: 5px"
                onclick="document.location='{{ redirect()->back() }}'">
            {{ __('Clear') }}
        </button>
        {!! Form::button(__('Add'), [
            'type' => 'submit',
            'class' => 'fw-bold fs-4 text-center pl-20 pr-20 pt-5 pb-5 ml-5 text-white btn-hover-focus',
            'style' => 'background-color: #D3152E; border: none; border-radius: 5px'
            ]) !!}
    </div>
{!! Form::close() !!}
