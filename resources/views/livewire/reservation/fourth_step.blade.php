<div>
    <div class="row d-flex flex-wrap mt-30 mb-30">
        @forelse($coaches as $coach)
            @include('livewire.reservation.coach')
        @empty
            <span class="text-muted">{{ __('No coaches found') }}</span>
        @endforelse
    </div>
    <div class="justify-content-end mt-4">
        <button wire:click="goToPreviousStep" type="button"
                style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Back') }}
        </button>
        <button wire:click="goToNextStep" type="button"
                style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px">
            {{ __('Next') }}
        </button>
    </div>
</div>

<style>
    input[type="radio"] {
        background-color: #fff;
        margin: 0;
        font: inherit;
        color: currentColor;
        width: 1.15em;
        height: 1.15em;
        border: 0.15em solid currentColor;
        border-radius: 50%;
    }
</style>

@if ($currentStep == 3)
    <style>
        .main_body {
            background-image: none;
        }
    </style>
@endif
