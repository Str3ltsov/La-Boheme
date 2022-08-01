<div class="d-flex flex-column justify-content-center
align-items-center my-3 text-light" style="gap: 50px">
    <div class="d-sm-block d-md-flex d-lg-flex" style="gap: 50px">
        @forelse ($reservationTypes ?? [] as $reservationType)
            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                <label>
                    <div class="form-control bg-transparent d-flex
                         justify-content-center align-items-center py-3 px-5 text-light"
                         style="border-radius: 20px; border-color: #C19F5F;
                         min-width: 300px; max-width: 400px">
                        <input
                            wire:model.lazy="reservation_type"
                            class="form-check-input me-3"
                            type="radio"
                            name="reservation_type"
                            id="reservation_type"
                            value="{{ $reservationType->id }}"
                            onclick="fetchUnavailableDates({{ $reservationType->id }})"
                        >
                        <div class="text-center">
                            <span class="form-check-label fs-4">{{ __($reservationType->name) }}</span>
                            <p class="m-0 fs-4">{{ __($reservationType->description) }}</p>
                        </div>
                    </div>
                </label>
                @error('reservation_type')
                    <span class="text-danger fs-5">{{ $message }}</span>
                @enderror
            </div>
            @empty
                <div class="form-control d-flex flex-column justify-content-center align-items-center">
                    <p>{{ __('Nerasta rezervavimo tipų') }}</p>
                </div>
        @endforelse
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <input
            wire:model="date" type="text"
            class="form-control datepicker fs-4 text-light bg-transparent text-center"
            style="width: 300px; border-radius: 15px; border-color: #C19F5F;"
            autocomplete="off"
            data-provide="datepicker" data-date-autoclose="true"
            data-date-format="yyyy/mm/dd" data-date-today-highlight="true"
            id="date_picker" placeholder="{{ __('Pasirinkite datą') }}"
            onchange="this.dispatchEvent(new InputEvent('input'))"
            onkeydown="return false"
        >
        @error('date')
            <span class="text-danger fs-5">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex" style="gap: 10px;">
        <button wire:click="addTimesAndGoToNextStep" type="button" class="fw-bold fs-4"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 150px">
            {{ __('Toliau') }}
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>

@push('scripts')
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

