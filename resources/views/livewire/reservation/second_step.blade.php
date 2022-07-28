<div class="d-flex flex-column justify-content-center
align-items-center my-3 text-light" style="gap: 10px">
    <div class="d-flex flex-column justify-content-center align-items-center w-100 p-3">
        <select wire:model.lazy="time" class="form-select fs-4 bg-transparent text-light" name="time"
                style="width: 300px; border-radius: 15px; border-color: #C19F5F; min-width: 300px; max-width: 400px;">
            <option value="" selected>{{ __('Pasirinkite laiką') }}</option>
            @forelse ($times ?? [] as $time)
                <option value="{{ $time }}">{{ $time }}</option>
            @empty
                <option value="" disabled>{{ __('Nerasta laikų') }}</option>
            @endforelse
        </select>
        @error('time')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center w-100 p-3">
        <input
            wire:model.lazy="number_of_people"
            type="number"
            @if ($reservation_type == \App\Helpers\Constants::reservationTypeTable)
                min="1"
                max="8"
            @else
                min="8"
            @endif
            name="number_of_people"
            class="form-control fs-4 bg-transparent text-light"
            style="border-radius: 15px; border-color: #C19F5F; min-width: 300px; max-width: 400px;"
            placeholder="{{ __('Žmonių skaičius') }}"
            oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
        >
        @error('number_of_people')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex justify-content-end mt-4" style="gap: 20px;">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4"
                style="background-color: #BBBBBB; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            <i class="fa-solid fa-arrow-left"></i>
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" class="fw-bold fs-4"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            {{ __('Toliau') }}
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>
