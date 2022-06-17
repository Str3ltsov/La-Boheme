<div class="d-flex flex-column justify-content-center h-100">
    <h4 class="pb-4">{{ __('Paslaugos užsakymas') }}</h4>
    <div class="card p-4">
        <div class="d-flex">
            <h5 class="text-muted me-1">{{ $steps[$currentStep]['step'] }}</h5>
            <h5>{{ $steps[$currentStep]['description'] }}</h5>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-start my-3">
                <input
                    wire:model.lazy="client_name"
                    type="text"
                    name="clientName"
                    class="form-control mt-3"
                    placeholder="{{ __('Vardas') }}"
                >
                @error('client_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input
                    wire:model.lazy="client_email"
                    type="email"
                    name="email"
                    class="form-control mt-3"
                    placeholder="{{ __('El. pašto adresas') }}"
                >
                @error('client_email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input
                    wire:model.lazy="client_phone_number"
                    type="text"
                    name="clientPhoneNumber"
                    class="form-control mt-3"
                    placeholder="{{ __('Telefonas') }}"
                >
                @error('client_phone_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <textarea
                    wire:model.lazy="client_additional_info"
                    rows="4"
                    name="clientAdditionalInformation"
                    class="form-control mt-3"
                    placeholder="{{ __('Papildoma informacija') }}"
                ></textarea>
                @error('client_additional_information')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <div class="d-flex justify-content-end" style="gap: 10px;">
            <button wire:click="goToPreviousStep" type="button" class="btn btn-secondary">{{ __('Atgal') }}</button>
            <button wire:click="goToNextStep" type="button" class="btn btn-primary">{{ __('Toliau') }}</button>
        </div>
    </div>
</div>
