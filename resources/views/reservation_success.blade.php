@extends('layouts.app')

@section('content')
<div class="w-100">
    @include('flash_message')
</div>
<div>
    <div>
        <p class="m-0" style="line-height: 2">
            @if (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeVyrtren)
                {{ __('Netrukus el. paštu gausite rezervacijos patvirtinimą. Jei turite kokių nors klausimų kreipkitės telefonu +370 686 10246 arba el. paštu aurimas@amcoachlab.com') }}
            @elseif (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeVyrtrenass)
                {{ __('Ačiū, kad domitės miūsų paslaugomis. Per 1-2 darbo dienas pateiksime Jums pasiūlymą. Toliau kylančius klausimus galėsite derinti telefonu +370 686 10246 arba el. paštu aurimas@amcoachlab.com') }}
            @elseif (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeFiztren)
                {{ __('Ačiū, kad domitės miūsų paslaugomis. Per 1-2 darbo dienas pateiksime Jums pasiūlymą. Toliau kylančius klausimus galėsite derinti telefonu +370 686 10246 arba el. paštu aurimas@amcoachlab.com') }}
            @endif
        </p>
    </div>
</div>
<div class="pt-20">
    <button type="button" onclick="closeWindow()" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 170px">
        {{ __('Uždaryti') }}
    </button>
</div>
@endsection

@push('scripts')
    <script>
        function closeWindow() {
            window.location.href = "{{ route('livewire.reservation')}}";
        }
    </script>
@endpush
