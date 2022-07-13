<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center h-100 p-4">
        <h1 class="fw-bolder">{{ __('Paslaugos užsakymas') }}</h1>
        <p class="fs-5">{{ __('Staliuko rezervacija ar šventės užsakymas') }}</p>
    </div>
    <form wire:submit.prevent="submit"/>
        @if ($currentStep == 1)
            @include('livewire.reservation.first_step')
        @elseif ($currentStep == 2)
            @include('livewire.reservation.second_step')
        @elseif ($currentStep == 3)
            @include('livewire.reservation.third_step')
        {{-- @elseif ($currentStep == 4)
            @include('livewire.reservation.fourth_step') --}}
        @elseif ($currentStep == 4)
            @include('livewire.reservation.fifth_step')
        @elseif ($currentStep == 5)
            @include('livewire.reservation.sixth_step')
        @endif
    </form>
</div>
