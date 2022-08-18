@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-center align-items-center text-center p-5" style="height: 300px; gap: 10px">
            <h1 class="text-light" id="cormorant">{{ __('Administratoriaus paskyra') }}</h1>
            <h1 class="text-light" id="cormorant">{{ __('Stalos') }}</h1>
        </div>
        <img src="/images/grunge-dark-temp.png" alt="grunge-dark-temp"
             style="width: 100%; display: flex; align-items: flex-end">
        <div class="d-flex flex-column justify-content-start"
             style="background-color: #0F0E0F; min-height: 85vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent p-4" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 p-4 text-light"
                     style="font-size: 1.3em; background-color: #151515; width: clamp(400px, 100%, 1200px)">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div class="p-4 w-100">
                        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-center my-3 fs-4" style="gap: 15px">
                            <div class="d-flex flex-column w-100 my-3">
                                <h4>{{ __('Sukurti nepasiekiamą datą') }}</h4>
                                @include('admin.tables.unavailable_date_form')
                            </div>
                            <div class="d-flex flex-column w-100 my-3">
                                <h4>{{ __('Sukurti nepasiekiamos datos laiką') }}</h4>
                                @include('admin.tables.unavailable_datetime_form')
                            </div>
                        </div>
                    </div>
                    <div class="p-4 w-100">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="m-1">{{ __('Stalos Id') }}: {{ $table->id ?? '?'}}</h4>
                            <div class="d-flex" style="gap: 10px">
                                <a class="fw-bold fs-4 text-center btn-hover-focus" href="{{ route('admin.tables') }}"
                                   style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                               color: black; padding: 10px 0; width: 150px; text-decoration: none">
                                    {{ __('Atgal') }}
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-start my-3" style="gap: 15px">
                            <div class="d-flex flex-column w-100">
                                <h4 class="m-1">{{ __('Nepasiekiamos datos laikai') }}</h4>
                                @include('admin.tables.unavailable_dates')
                            </div>
                            <div class="d-flex flex-column w-100">
                                <h4 class="m-1">{{ __('Nepasiekiamos datos laikai') }}</h4>
                                @include('admin.tables.unavailable_datetimes')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
