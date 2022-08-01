@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-center align-items-center text-center p-5" style="height: 300px">
            <p class="fs-2 text-light" id="cormorant">{{ __('Paslaugos užsakymas') }}</p>
            <p class="fs-2 text-light" id="cormorant">{{ __('Staliuko rezervacija ar šventės užsakymas') }}</p>
        </div>
        <img src="/images/grunge-dark-temp.png" alt="grunge-dark-temp"
             style="width: 100%; display: flex; align-items: flex-end">
        <div class="d-flex flex-column justify-content-start"
             style="background-color: #0F0E0F; min-height: 65vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent p-4" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-start
                my-3 p-5 fs-5 text-light" style="font-size: 1.1em; background-color: #151515; max-width: 800px">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start my-3 fs-5">
                        <div class="d-flex flex-column" style="gap: 10px;">
                            <p>
                                {{ __('Jūsų paslauga sėkmingai išsaugota. Netrukus el. paštu gausite administratoriaus patvirtinimą.') }}
                            </p>
                            <p>
                                {{ __('Norėdami atsisakyti paslaugos galite:') }}
                            </p>
                            <ol>
                                <li>{{ __('Susisiekti su mumis telefonu 8-657 56270.') }}</li>
                                <li>{{ __('Parašyti el. laišką info@laboheme.lt') }}</li>
                                <li>{{ __('Paspausti šią nuorodą.') }}</li>
                            </ol>
                            <p>
                                {{ __('Šią informaciją taip pat gausite nurodytu el. paštu.') }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100 mt-4" style="gap: 20px;">
                        <button type="button" class="fw-bold fs-5" onclick="closeWindow()"
                                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                                color: black; padding: 10px 0; width: 150px">
                            {{ __('Uždaryti langą') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function closeWindow() {
            window.location.href = "{{ route('livewire.reservation')}}";
        }
    </script>
@endpush
