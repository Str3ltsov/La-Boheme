<div>
    <div class="pt-20">
        <input
            wire:model.lazy="client_name"
            type="text"
            name="clientName"
            class="form-control"
            style="border-radius: 5px;"
            placeholder="{{ __('Vardas*') }}"
        >
        @error('client_name')
            <span class="text-danger mt-1 fs-5 fade-in">{{ $message }}</span>
        @enderror
    </div>
    <div class="pt-20">
        <input
            wire:model.lazy="client_email"
            type="email"
            name="email"
            class="form-control"
            style="border-radius: 5px;"
            placeholder="{{ __('El. pašto adresas *') }}"
        >
        @error('client_email')
            <span class="text-danger mt-1 fs-5 fade-in">{{ $message }}</span>
        @enderror
    </div>
    <div class="pt-20">
        <input
            wire:model.lazy="client_phone_number"
            type="text"
            name="clientPhoneNumber"
            class="form-control"
            style="border-radius: 5px;"
            placeholder="{{ __('Telefonas *') }}"
        >
        @error('client_phone_number')
            <span class="text-danger mt-1 fs-5 fade-in">{{ $message }}</span>
        @enderror
    </div>
    <div class="pt-20">
        <textarea
            wire:model.lazy="client_additional_info"
            rows="4"
            name="clientAdditionalInformation"
            class="form-control"
            style="border-radius: 5px;"
            placeholder="{{ __('Papildoma informacija') }}"
        ></textarea>
    </div>
    <div class="pt-20">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4 btn-hover-focus" style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" class="fw-bold fs-4 btn-hover-focus" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px">
            {{ __('Toliau') }}
        </button>
    </div>
</div>
