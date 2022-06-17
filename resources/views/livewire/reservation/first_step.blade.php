<div class="d-flex flex-column justify-content-center h-100">
    <h4 class="pb-4">{{ __('Paslaugos užsakymas') }}</h4>
    <div class="card p-4">
        <div class="d-flex">
            <h5 class="text-muted me-1">{{ $steps[$currentStep]['step'] }}</h5>
            <h5>{{ $steps[$currentStep]['description'] }}</h5>
        </div>
        <div class="d-flex justify-content-center align-items-center my-3">
            <div class="d-flex flex-column w-100 me-3">
                @forelse ($reservationTypes ?? [] as $reservationType)
                    <div class="form-control d-flex flex-column justify-content-center align-items-center mt-3">
                        <div>
                            <input
                                wire:model.lazy="reservation_type"
                                class="form-check-input"
                                type="radio"
                                name="reservation"
                                value="{{ $reservationType->id }}"
                                onclick="fetchUnavailableDates({{ $reservationType->id }})"
                            >
                            <label class="form-check-label fs-5">{{ __($reservationType->name) }}</label>
                        </div>
                        <p class="m-0">{{ __($reservationType->description) }}</p>
                    </div>
                    @error('reservation_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                @empty
                    <div class="form-control d-flex flex-column justify-content-center align-items-center">
                        <p>{{ __('No reservation types found') }}</p>
                    </div>
                @endforelse
            </div>
            <div class="w-100">
                <label class="form-check-label fs-5">{{ __('Data') }}:</label>
                <input
                    wire:model="date"
                    type="text" class="form-control datepicker fs-5"
                    autocomplete="off"
                    data-provide="datepicker" data-date-autoclose="true"
                    data-date-format="yyyy/mm/dd" data-date-today-highlight="true"
                    id="date_picker"
                    onchange="this.dispatchEvent(new InputEvent('input'))"
                >
                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button wire:click="addTimesAndGoToNextStep" type="button" class="btn btn-primary">{{ __('Toliau') }}</button>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        async function fetchUnavailableDates(reservationType) {
            try {
                const response =
                    await fetch(`{{ env('APP_URL') }}:{{ env('APP_PORT') }}/api/v1/unavailable_dates/${reservationType}`)
                const unavailableDates = await response.json();
                getDatePickerWithUnavailableDates(unavailableDates);
            }
            catch (error) {
                console.error(error);
            }
        }

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

