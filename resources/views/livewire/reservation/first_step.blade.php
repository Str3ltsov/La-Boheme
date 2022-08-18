<div class="d-flex flex-column justify-content-center
align-items-center my-3 text-light fade-in" style="gap: 50px">
    <div class="d-sm-block d-md-flex d-lg-flex" style="gap: 50px">
        @forelse ($reservationTypes ?? [] as $reservationType)
            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                <label class="w-100">
                    <div class="form-control bg-transparent d-flex justify-content-center
                    align-items-center py-3 px-5 text-light input-hover-focus "
                         style="border-radius: 20px; min-width: 300px; max-width: 400px">
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
            class="form-control datepicker fs-4 text-light bg-transparent text-center py-2 input-hover-focus fade-in"
            style="width: 300px; border-radius: 15px"
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
        <button wire:click="GoToNextStepAndAddStartTimes" type="button" class="fw-bold fs-4 btn-hover-focus"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 150px">
            {{ __('Toliau') }}
        </button>
    </div>
</div>

