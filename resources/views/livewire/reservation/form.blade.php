<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center h-100 p-4">
        <h1 class="fw-bolder">Paslaugos užsakymas</h1>
        <p class="fs-5">Staliuko rezervacija ar šventės užsakymas</p>
    </div>
    <form wire:submit.prevent="submit"/>
        @if ($currentStep == 1)
            @include('livewire.reservation.first_step')
        @endif
    </form>
</div>
