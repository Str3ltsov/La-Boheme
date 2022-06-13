 <div class="d-flex flex-column justify-content-center h-100">
        <h4 class="pb-4">
            {{ $reservation_type == 1 ? 'Staliuko rezervacija' : 'Šventės organizavimo paslauga'}}
        </h4>
        <div class="card p-4">
            <div class="d-flex">
                <h5 class="text-muted me-1">{{ $steps[$currentStep]['step'] }}</h5>
                <h5>{{ $steps[$currentStep]['description'] }}</h5>
            </div>
            @if ($reservation_type == 1)
                @include('livewire.reservation.questions_one')
            @elseif ($reservation_type == 2)
                @include('livewire.reservation.questions_two')
            @endif
            <div class="d-flex justify-content-end" style="gap: 10px;">
                <button wire:click="goToPreviousStep" type="button" class="btn btn-secondary">Atgal</button>
                <button wire:click="goToNextStep" type="button" class="btn btn-primary">Toliau</button>
            </div>
        </div>
 </div>