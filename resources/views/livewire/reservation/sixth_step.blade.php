<div class="d-flex flex-column justify-content-center h-100">
    <h4 class="pb-4">{{ __('Paslaugos užsakymas') }}</h4>
    <div class="card p-4">
        <div class="d-flex">
            <h5 class="text-muted me-1">{{ $steps[$currentStep]['step'] }}</h5>
            <h5>{{ $steps[$currentStep]['description'] }}</h5>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-start my-3 fs-5">
            <div>
                <div class="d-flex" style="gap: 10px">
                    <span>{{ __('Data') }}:</span>
                    <span>{{ $date }}</span>
                </div>
                <div class="d-flex" style="gap: 10px">
                    <span>{{ __('Laikas') }}:</span>
                    <span>{{ $time }}</span>
                </div>
                <div class="d-flex" style="gap: 10px">
                    <span>{{ __('Žmonių skaičius') }}:</span>
                    <span>{{ $number_of_people }}</span>
                </div>
                <div class="d-flex" style="gap: 10px">
                    <span>{{ __('Padavėja') }}:</span>
                    <span>{{ $employees[\App\Helpers\Constants::employeeTypeWaiter]['name'] }}</span>
                </div>
                <div class="d-flex" style="gap: 10px">
                    <span>{{ __('Barmenas') }}:</span>
                    <span>{{ $employees[\App\Helpers\Constants::employeeTypeBartender]['name'] }}</span>
                </div>
            </div>
            <div class="mt-3">
                <p>
                    {{ __('Paslaugos patvirtinimas yra apmokestinamas 10 Eur.
                    Ši suma atšaukus paslaugą yra negrąžinama,
                    kitu atveju bus įtraukta į bendrą sąskaitą viešnagės metu.') }}
                </p>
            </div>
            <div class="d-flex" style="gap: 10px">
                <input
                    wire:model.lazy="accept"
                    type="checkbox"
                    name="Accept"
                    class="form-check-input"
                    value="{{ true }}"
                >
                <label for="Accept" class="form-check-label">
                    {{ __('Patvirtinu, kad su paslaugos sąlygomis susipažinau') }}
                </label>
            </div>
            @error('accept')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-end" style="gap: 10px;">
            <button wire:click="goToPreviousStep" type="button" class="btn btn-secondary">{{ __('Atgal') }}</button>
            <button wire:click="submit" type="submit" class="btn btn-primary">{{ __('Toliau') }}</button>
        </div>
    </div>
</div>

