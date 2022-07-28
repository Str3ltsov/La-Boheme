<div class="d-flex flex-column justify-content-center align-items-start
my-3 p-5 fs-4 text-light" style="font-size: 1.1em; background-color: #151515; max-width: 800px">
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
        {{--
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
    <div class="mt-3">
        @if ($reservation_type == \App\Helpers\Constants::reservationTypeHall)
            <p>
                {{ __('Paslaugos patvirtinimas yra apmokestinamas 10 Eur.
                       Ši suma atšaukus paslaugą yra negrąžinama,
                       kitu atveju bus įtraukta į bendrą sąskaitą viešnagės metu.') }}
            </p>
        @endif
    </div>
    <div class="d-flex" style="gap: 10px">
        <input
            wire:model.lazy="accept"
            type="checkbox"
            name="Accept"
            class="form-check-input"
            style="min-width: 20px"
            value="{{ true }}"
        >
        <label for="Accept" class="form-check-label">
            <span>{{ __('Visos teisės saugomos 2022 La Boheme.') }}</span>
            <a class="text-reset text-decoration-none" href="#">
                <span style="color: #C19F5F">{{ __('Privatumo politika') }}</span>
            </a>
        </label>
    </div>
    @error('accept')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div class="d-flex justify-content-center align-items-center mt-4 w-100" style="gap: 20px;">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4"
                style="background-color: #BBBBBB; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            <i class="fa-solid fa-arrow-left"></i>
            {{ __('Atgal') }}
        </button>
        <button wire:click="submit" type="submit" class="fw-bold fs-4"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
               color: black; padding: 10px 0; width: 150px">
            {{ __('Užsisakyti') }}
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>
