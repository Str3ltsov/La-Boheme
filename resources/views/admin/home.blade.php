@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center my-5"
         style="min-height: clamp(10vh, 70vh, 100vh)">
        <div class="d-flex justify-content-center align-items-center w-auto">
            <div>
                <div class="w-100">
                    @include('flash_message')
                </div>
                <div class="d-flex flex-column justify-content-center
                align-items-center text-center text-light" style="gap: 10px">
                    <i class="fa-solid fa-circle-info" style="font-size: 3em"></i>
                    <h1 id="cormorant">
                        {{ __('Dabar esate prisijungę kaip administratorius!') }}
                    </h1>
                    <h1 id="cormorant">
                        {{ __('Visos administratoriaus puslapiai yra parodomas žemiau') }}
                    </h1>
                    <div class="d-flex justify-content-center mt-4 flex-wrap w-auto" style="gap: 20px;" id="cormorant">
                        <a class="fw-bold fs-3 bg-black bg-opacity-50" href="{{ route('admin.reservations') }}"
                           style="border: 1px solid #C19F5F; border-radius: 17.5px;
                           color: #C19F5F; padding: 10px 0; width: 150px; text-decoration: none">
                            {{ __('Reservacijos') }}
                        </a>
                        <a class="fw-bold fs-3 bg-black bg-opacity-50" href="{{ route('admin.tables') }}"
                           style="border: 1px solid #C19F5F; border-radius: 17.5px;
                           color: #C19F5F; padding: 10px 0; width: 150px; text-decoration: none">
                            {{ __('Stalai') }}
                        </a>
                        <a class="fw-bold fs-3 bg-black bg-opacity-50" href="{{ route('admin.halls') }}"
                           style="border: 1px solid #C19F5F; border-radius: 17.5px;
                           color: #C19F5F; padding: 10px 0; width: 150px; text-decoration: none">
                            {{ __('Salės') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
@endpush
