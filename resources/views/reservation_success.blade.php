@extends('layouts.app')

@section('content')
<div class="w-100">
    @include('flash_message')
</div>
<div>
    <div>
        <p class="m-0" style="line-height: 2">
            @if (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeVyrtren)
                You will receive an email confirmation of your reservation shortly.
                If you have any questions, please contact us by phone
                <a href="tel:+37068610246">+370 686 10246</a> or by email
                <a href="mailto:aurimas@amcoachlab.com">aurimas@amcoachlab.com</a>
            @elseif (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeVyrtrenass)
                Thank you for your interest in our services.
                We will provide you with an offer within 1-2 working days.
                Further questions can be addressed to us by phone
                <a href="tel:+37068610246">+370 686 10246</a> or by email
                <a href="mailto:aurimas@amcoachlab.com">aurimas@amcoachlab.com</a>
            @elseif (session()->get('reservationType') == \App\Helpers\Constants::reservationTypeFiztren)
                Thank you for your interest in our services.
                We will provide you with an offer within 1-2 working days.
                Further questions can be addressed to us by phone
                <a href="tel:+37068610246">+370 686 10246</a> or by email
                <a href="mailto:aurimas@amcoachlab.com">aurimas@amcoachlab.com</a>
            @endif
        </p>
    </div>
</div>
<div class="pt-20">
    <button type="button" onclick="closeWindow()" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 170px">
        {{ __('Close') }}
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
