<div class="d-flex flex-column justify-content-center
align-items-center my-3 text-light w-100 fade-in" style="gap: 20px">
    <div class="d-flex flex-column justify-content-center align-items-center w-100">
        <input
            wire:model.lazy="client_name"
            type="text"
            name="clientName"
            class="form-control fs-4 bg-transparent text-light input-hover-focus py-2"
            style="border-radius: 5px; width: clamp(200px, 100%, 500px)"
            placeholder="{{ __('Vardas*') }}"
        >
        @error('client_name')
            <span class="text-danger mt-1 fs-5 fade-in">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center w-100">
        <input
            wire:model.lazy="client_email"
            type="email"
            name="email"
            class="form-control fs-4 bg-transparent text-light input-hover-focus py-2"
            style="border-radius: 5px; width: clamp(200px, 100%, 500px)"
            placeholder="{{ __('El. pašto adresas*') }}"
        >
        @error('client_email')
            <span class="text-danger mt-1 fs-5 fade-in">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center w-100">
        <input
            wire:model.lazy="client_phone_number"
            type="text"
            name="clientPhoneNumber"
            class="form-control fs-4 bg-transparent text-light py-2 input-hover-focus"
            style="border-radius: 5px; width: clamp(200px, 100%, 500px); border: 1px solid #D2D8DD;"
            placeholder="{{ __('Telefonas*') }}"
        >
        @error('client_phone_number')
            <span class="text-danger mt-1 fs-5 fade-in">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center w-100">
        <textarea
            wire:model.lazy="client_additional_info"
            rows="4"
            name="clientAdditionalInformation"
            class="form-control fs-4 bg-transparent text-light input-hover-focus"
            style="border-radius: 5px; width: clamp(200px, 100%, 500px)"
            placeholder="{{ __('Papildoma informacija') }}"
        ></textarea>
    </div>
    <div class="d-flex justify-content-end mt-2 mt-md4" style="gap: 20px;">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4 btn-hover-focus"
                style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" class="fw-bold fs-4 btn-hover-focus"
                style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px">
            {{ __('Toliau') }}
        </button>
    </div>
</div>
