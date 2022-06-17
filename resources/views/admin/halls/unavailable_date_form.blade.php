{!! Form::open([
    'route' => ['admin.halls.createUnavailableDate', $hall->id],
    'method' => 'post'
    ]) !!}
    <input type="hidden" name="hall_id" value="{{ $hall->id }}">
    <div class="w-100 d-flex align-items-center my-3">
        <label for="unavailable_date" class="form-label w-25">{{ __('Data') }}:</label>
        <input
            type="text" class="form-control datepicker fs-5"
            autocomplete="off" name="unavailable_date"
            data-provide="datepicker" data-date-autoclose="true"
            data-date-format="yyyy/mm/dd" data-date-today-highlight="true"
            id="date_picker"
            onchange="this.dispatchEvent(new InputEvent('input'))"
        >
    </div>
    <div class="d-flex justify-content-end align-items-center mt-2" style="gap: 10px">
        <button type="reset" class="btn btn-secondary" onclick="document.location='{{ redirect()->back() }}'">
            {{ __('Nuvalyti') }}
        </button>
        {!! Form::button(__('Sukurti'), [
            'type' => 'submit',
            'class' => 'btn btn-success'
            ]) !!}
    </div>
{!! Form::close() !!}

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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
