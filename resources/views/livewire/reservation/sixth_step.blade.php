    {{--
    <div>
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
    </div>
    --}}
    <div class="pt-20">
        <input
            wire:model.lazy="accept"
            type="checkbox"
            name="Accept"
            class="form-check-input"
            style="min-width: 20px"
            value="{{ true }}"
            required
        >
        <label for="Accept" class="form-check-label">
            <span>{{ __('Sutinku su svetainės') }}</span>
            <span style="color: #D3152E; cursor: pointer" onclick="window.open('/private_policy', '_blank')">{{ __('Privatumo politika') }}</span>
        </label>
    </div>
    @error('accept')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div class="pt-20">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4 btn-hover-focus" style="background-color: #BBBBBB; border: none; border-radius: 5px;
                color: black; padding: 10px 0; width: clamp(220px, 100%, 230px)">
            {{ __('Atgal') }}
        </button>
        <button wire:click="submit" type="submit" class="fw-bold fs-4 btn-hover-focus" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: clamp(220px, 100%, 230px)">
            {{ __('Pateikti užklausą') }}
        </button>
    </div>
