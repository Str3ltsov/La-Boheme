{!! Form::open([
    'route' => ['admin.fiztren.createUnavailableDate', $hall->id],
    'method' => 'post'
    ]) !!}
    <input type="hidden" name="fiztren_id" value="{{ $hall->id }}">
    <div class="w-100 d-flex align-items-center my-3">
        <label for="unavailable_date" class="form-label w-25 fs-4">{{ __('Data') }}:</label>
        <input
            type="text" class="form-control fs-4 bg-transparent text-light"
            style="border-radius: 5px; border-color: #C19F5F;"
            autocomplete="off" name="unavailable_date"
            data-provide="datepicker" data-date-autoclose="true"
            data-date-format="yyyy/mm/dd" data-date-today-highlight="true"
            id="date_picker" placeholder="yyyy-mm-dd"
            onchange="this.dispatchEvent(new InputEvent('input'))"
        >
    </div>
    <div class="d-flex justify-content-end align-items-center mt-2" style="gap: 10px">
        <button type="reset" class="fw-bold fs-4 text-center py-2 px-4 btn-hover-focus"
                style="background-color: #BBBBBB; border: none; border-radius: 17.5px"
                onclick="document.location='{{ redirect()->back() }}'">
            {{ __('Nuvalyti') }}
        </button>
        {!! Form::button(__('Sukurti'), [
            'type' => 'submit',
            'class' => 'fw-bold fs-4 text-center py-2 px-4 btn-hover-focus',
            'style' => 'background-color: #D3152E; border: none; border-radius: 17.5px'
            ]) !!}
    </div>
{!! Form::close() !!}

@push('scripts')
    <script>
        const reservationType = 2;
        const response = fetch(`{{ env('APP_URL') }}:{{ env('APP_PORT') }}/api/v1/unavailable_dates/${reservationType}`)
            .then(response => response.json())
            .then(unavailableDates => getDatePickerWithUnavailableDates(unavailableDates))
            .catch(error => console.error(error));

        function getDatePickerWithUnavailableDates(unavailableDates) {
            $(() => {
                $('#date_picker').datepicker({
                    minDate: '{{ now()->toDateString() }}',
                    maxDate: '+3M',
                    dateFormat: 'yy-mm-dd',
                    beforeShowDay: date => {
                        const dateToString = jQuery.datepicker.formatDate('yy-mm-dd', date);
                        return [unavailableDates.indexOf(dateToString) === -1]
                    }
                });
            });
        }
    </script>
@endpush
