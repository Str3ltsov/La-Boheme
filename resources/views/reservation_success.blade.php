@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-center align-items-center text-center text-light p-5" style="height: 300px">
            <h1 id="cormorant">{{ __('Paslaugos užsakymas') }}</h1>
            <h1 id="cormorant">{{ __('Staliuko rezervacija ar šventės užsakymas') }}</h1>
        </div>
        <img src="/images/grunge-dark-temp.png" alt="grunge-dark-temp"
             style="width: 100%; display: flex; align-items: flex-end">
        <div class="d-flex flex-column justify-content-start"
             style="background-color: #0F0E0F; min-height: 85vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent p-4" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-start
                my-3 p-4 fs-5 text-light" style="font-size: 1.1em; background-color: #151515; max-width: 800px">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start my-3 fs-5">
                        <div class="d-flex flex-column" style="gap: 10px;">
                            <p class="m-0" style="line-height: 2">
                                @if (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeTable)
                                    {{ __('Netrukus el.paštu gausite rezervacijos patvirtinimą. Jeigu norėtumėte iš anksto paruošto stalo ar suderinti meniu, kreipkitės telefonu +37067354366 arba el. paštu events@laboheme.lt') }}
                                @elseif (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeHall)
                                    {{ __('Ačiū, kad domitės miūsų pasluagomis. Per 1-2 darbo dienas pateiksime Jums pasiūlymą. Toliau kylančius klausimus galėsite derinti telefonu +37067354366 arba el. paštu events@laboheme.lt') }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100 mt-4" style="gap: 20px;">
                        <button type="button" class="fw-bold fs-4 btn-hover-focus" onclick="closeWindow()"
                                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                                color: black; padding: 10px 0; width: 170px">
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
