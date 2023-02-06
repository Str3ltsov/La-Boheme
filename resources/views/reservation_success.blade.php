@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-center align-items-center" style="background-color: #1B3253; min-height: 100vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center align-items-center bg-transparent p-4" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-start my-3 p-4 fs-5 text-light" style="font-size: 1.1em; background-color: #151515; max-width: 800px">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start my-3 fs-5">
                        <div class="d-flex flex-column" style="gap: 10px;">
                            <p class="m-0" style="line-height: 2">
                                @if (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeVyrtren)
                                    {{ __('Netrukus el. paštu gausite rezervacijos patvirtinimą. Jei turite kokių nors klausimų kreipkitės telefonu +370 686 10246 arba el. paštu joana@getweb.lt') }}
                                @elseif (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeVyrtrenass)
                                    {{ __('Ačiū, kad domitės miūsų paslaugomis. Per 1-2 darbo dienas pateiksime Jums pasiūlymą. Toliau kylančius klausimus galėsite derinti telefonu +370 686 10246 arba el. paštu joana@getweb.lt') }}
                                @elseif (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeFiztren)
                                    {{ __('Ačiū, kad domitės miūsų paslaugomis. Per 1-2 darbo dienas pateiksime Jums pasiūlymą. Toliau kylančius klausimus galėsite derinti telefonu +370 686 10246 arba el. paštu joana@getweb.lt') }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100 mt-4" style="gap: 20px;">
                        <button type="button" class="fw-bold fs-4 btn-hover-focus" onclick="closeWindow()"
                            style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 170px">
                            {{ __('Uždaryti') }}
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
