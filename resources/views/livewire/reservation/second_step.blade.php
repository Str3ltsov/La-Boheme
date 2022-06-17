<div class="d-flex flex-column justify-content-center h-100">
    <h4 class="pb-4">{{ __('Paslaugos užsakymas') }}</h4>
    <div class="card p-4">
        <div class="d-flex">
            <h5 class="text-muted me-1">{{ $steps[$currentStep]['step'] }}</h5>
            <h5>{{ $steps[$currentStep]['description'] }}</h5>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center my-3">
            <div class="card d-flex flex-column justify-content-center align-items-center w-100 p-3">
                <h6 class="fw-bolder mb-2 text-uppercase">{{ __('Laikas') }}</h6>
                <select wire:model.lazy="time" class="form-select fs-5 w-25" name="time">
                    <option value="" selected></option>
                    @forelse ($times ?? [] as $time)
                        <option value="{{ $time }}">{{ $time }}</option>
                    @empty
                        <option value="" disabled>{{ __('No times found') }}</option>
                    @endforelse
                </select>
                @error('time')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="card d-flex flex-column justify-content-center align-items-center w-100 p-3">
                <h6 class="fw-bolder mb-2 text-uppercase">{{ __('Žmonių skaičius') }}</h6>
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
                    class="form-control fs-5 w-25"
                >
                @error('number_of_people')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-end" style="gap: 10px;">
            <button wire:click="goToPreviousStep" type="button" class="btn btn-secondary">{{ __('Atgal') }}</button>
            <button wire:click="goToNextStep" type="button" class="btn btn-primary">{{ __('Toliau') }}</button>
        </div>
    </div>
</div>
