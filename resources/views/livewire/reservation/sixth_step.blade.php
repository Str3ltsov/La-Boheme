<div class="d-flex flex-column justify-content-center align-items-start
    my-3 px-3 px-lg-5 py-5 fs-4 text-light fade-in" style="font-size: 1.1em; background-color: #151515; max-width: 800px">
    <div>
        {{--
        <div class="d-flex" style="gap: 10px">
            <span>{{ __('Data') }}:</span>
            <span>{{ $date ?? '-' }}</span>
        </div>
        <div class="d-flex" style="gap: 10px">
            <span>{{ __('Laikas') }}:</span>
            <span>{{ $time ?? '-' }}</span>
        </div>
        <div class="d-flex" style="gap: 10px">
            <span>{{ __('Žmonių skaičius') }}:</span>
            <span>{{ $number_of_people ?? '-' }}</span>
        </div>
        <div class="d-flex" style="gap: 10px">
            <span>{{ __('Padavėja') }}:</span>
            <span>{{ $employees[\App\Helpers\Constants::employeeTypeWaiter]['name'] ?? '-' }}</span>
        </div>
        <div class="d-flex" style="gap: 10px">
            <span>{{ __('Barmenas') }}:</span>
            <span>{{ $employees[\App\Helpers\Constants::employeeTypeBartender]['name'] ?? '-' }}</span>
        </div>
        --}}
    </div>
    <div class="d-flex justify-content-center align-items-center fade-in" style="gap: 10px">
        <input
            wire:model.lazy="accept"
            type="checkbox"
            name="Accept"
            class="form-check-input"
            style="min-width: 20px"
            value="{{ true }}"
        >
        <label for="Accept" class="form-check-label">
            <span>{{ __('Sutinku su svetainės privatumo politika') }}</span>
            <span style="color: #C19F5F; cursor: pointer" onclick="window.open('/private_policy', '_blank')">{{ __('Privatumo politika') }}</span>
        </label>
    </div>
    @error('accept')
        <span class="text-danger my-2 fade-in">{{ $message }}</span>
    @enderror
    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center mt-5 w-100 fade-in" style="gap: 20px;">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4 btn-hover-focus"
                style="background-color: #BBBBBB; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: clamp(220px, 100%, 230px)">
            {{ __('Atgal') }}
        </button>
        <button wire:click="submit" type="submit" class="fw-bold fs-4 btn-hover-focus"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
               color: black; padding: 10px 0; width: clamp(220px, 100%, 230px)">
            {{ __('Pateikti užklausą') }}
        </button>
    </div>
</div>
