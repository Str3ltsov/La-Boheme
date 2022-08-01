<div>
    <div class="d-flex flex-column justify-content-center align-items-center text-center p-5" style="height: 300px">
        <h1 class="text-light" id="cormorant">{{ __('Paslaugos užsakymas') }}</h1>
        <h1 class="text-light" id="cormorant">{{ __('Staliuko rezervacija ar šventės užsakymas') }}</h1>
    </div>
    <form wire:submit.prevent="submit"/>
        <img src="/images/grunge-dark-temp.png" alt="grunge-dark-temp"
             style="width: 100%; display: flex; align-items: flex-end">
        <div class="d-flex flex-column justify-content-start"
             style="background-color: #0F0E0F; min-height: 65vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent p-4" id="cormorant">
                <div class="w-50">
                    @include('flash_message')
                </div>
                @if ($currentStep == 1)
                    <div class="d-flex justify-content-center text-center text-light mb-5">
                        <h3>
                            {{ __('Prašome atsakyti į kelis klausimus, kad pateiktume Jūsų poreikius atitinkantį pasiūlymą') }}
                        </h3>
                    </div>
                @endif
                <div class="d-flex justify-content-center text-center text-light mb-4">
                    <h3 class="me-2">{{ $steps[$currentStep]['step'] }}</h3>
                    <h3>{{ $steps[$currentStep]['description'] }}</h3>
                </div>
                @if ($currentStep == 1)
                    @include('livewire.reservation.first_step')
                @elseif ($currentStep == 2)
                    @include('livewire.reservation.second_step')
                @elseif ($currentStep == 3)
                    @include('livewire.reservation.third_step')
                {{--
                @elseif($currentStep == 4)
                    @include('livewire.reservation.fourth_step')
                --}}
                @elseif ($currentStep == 4)
                    @include('livewire.reservation.fifth_step')
                @elseif ($currentStep == 5)
                    @include('livewire.reservation.sixth_step')
                @endif
            </div>
        </div>
    </form>
</div>
