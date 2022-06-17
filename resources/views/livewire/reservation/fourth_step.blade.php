<div class="d-flex flex-column justify-content-center h-100">
    <h4 class="pb-4">{{ __('Paslaugos užsakymas') }}</h4>
    <div class="card p-4">
        <div class="d-flex">
            <h5 class="text-muted me-1">{{ $steps[$currentStep]['step'] }}</h5>
            <h5>{{ $steps[$currentStep]['description'] }}</h5>
        </div>
        <div class="d-flex justify-content-center align-items-start my-3">
            <div class="d-flex flex-column w-100 me-3" style="gap: 15px">
                <h5>{{ __('Padavėjai') }}</h5>
                @forelse ($employees ?? [] as $employee)
                    @if ($employee->employee_type_id == \App\Helpers\Constants::employeeTypeWaiter)
                        @include('livewire.reservation.waiters')
                    @endif
                @empty
                    <div class="d-flex flex-column justify-content-center">
                        <p>{{ __('No bartenders found') }}</p>
                    </div>
                @endforelse
            </div>
            <div class="d-flex flex-column w-100 me-3" style="gap: 15px">
                <h5>{{ __('Barmenai') }}</h5>
                @forelse ($employees ?? [] as $employee)
                    @if ($employee->employee_type_id == \App\Helpers\Constants::employeeTypeBartender)
                        @include('livewire.reservation.bartenders')
                    @endif
                @empty
                    <div class="form-control d-flex flex-column justify-content-center align-items-center">
                        <p>{{ __('No bartenders found') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-end" style="gap: 10px;">
            <button wire:click="goToPreviousStep" type="button" class="btn btn-secondary">{{ __('Atgal') }}</button>
            <button wire:click="goToNextStep" type="button" class="btn btn-primary">{{ __('Toliau') }}</button>
        </div>
    </div>
</div>
