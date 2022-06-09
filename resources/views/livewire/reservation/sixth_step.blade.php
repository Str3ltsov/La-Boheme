<div class="d-flex flex-column justify-content-center h-100">
    <h4 class="pb-4">Paslaugos užsakymas</h4>
    <div class="card p-4">
        <div class="d-flex">
            <h5 class="text-muted me-1">{{ $steps[$currentStep]['step'] }}</h5>
            <h5>{{ $steps[$currentStep]['description'] }}</h5>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-start my-3 fs-5">
            <div>
                <div class="d-flex" style="gap: 10px">
                    <span>Data:</span>
                    <span>{{ $date }}</span>
                </div>
                <div class="d-flex" style="gap: 10px">
                    <span>Laikas:</span>
                    <span>{{ $time }}</span>
                </div>
                <div class="d-flex" style="gap: 10px">
                    <span>Žmonių skaičius:</span>
                    <span>{{ $number_of_people }}</span>
                </div>
                <div class="d-flex" style="gap: 10px">
                    <span>Padavėja:</span>
                    <span>{{ $employee_waiter }}</span>
                </div>
                <div class="d-flex" style="gap: 10px">
                    <span>Barmenas:</span>
                    <span>{{ $employee_bartender }}</span>
                </div>
            </div>
            <div class="mt-3">
                <p>
                    Paslaugos patvirtinimas yra apmokestinamas 10 Eur.
                    Ši suma atšaukus paslaugą yra negrąžinama,
                    kitu atveju bus įtraukta į bendrą sąskaitą viešnagės metu.
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
                    Patvirtinu, kad su paslaugos sąlygomis susipažinau
                </label>
            </div>
            @error('accept')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-end" style="gap: 10px;">
            <button wire:click="goToPreviousStep" type="button" class="btn btn-secondary">Atgal</button>
            <button wire:click="submit" type="button" class="btn btn-primary">Toliau</button>
        </div>
    </div>
</div>
