<div class="d-flex flex-column justify-content-center h-100">
    <h4 class="pb-4">Paslaugos užsakymas</h4>
    <div class="card p-4">
        <div class="d-flex">
            <h5 class="text-muted me-1">{{ $steps[$currentStep]['step'] }}</h5>
            <h5>{{ $steps[$currentStep]['description'] }}</h5>
        </div>
        <div class="d-flex justify-content-center align-items-center my-3">
            <div class="d-flex flex-column w-100 me-3">
                @forelse ($reservationTypes as $reservationType)
                    <div class="form-control d-flex flex-column justify-content-center align-items-center mt-3">
                        <div>
                            <input
                                wire:model.lazy="reservation_type"
                                class="form-check-input"
                                type="radio"
                                name="reservation"
                                value="{{ $reservationType->id }}"
                            >
                            <label class="form-check-label fs-5">{{ $reservationType->name }}</label>
                        </div>
                        <p class="m-0">{{ $reservationType->description }}</p>
                    </div>
                    @error('reservation_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                @empty
                    <div class="form-control d-flex flex-column justify-content-center align-items-center">
                        <p>No reservation types</p>
                    </div>
                @endforelse
            </div>
            <div class="w-100">
                <input
                    wire:model.lazy="date"
                    type="date"
                    class="date form-control fs-5"
                >
                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button wire:click="goToNextStep" type="button" class="btn btn-primary">Toliau</button>
        </div>
    </div>
</div>
