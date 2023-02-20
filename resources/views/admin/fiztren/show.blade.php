@extends('layouts.app')

@section('divider-text-1')
    {{ __('Administratoriaus paskyra') }}
@endsection

@section('divider-text-2')
    {{ __('Fizinio aktyvumo treneriai') }}
@endsection

@section('content')
    <div class="container" style="padding-inline: 0">
        <div class="d-flex flex-column justify-content-start pl-20 pr-20 pr-lg-0 pl-lg-0" style="min-height: 100%; padding: 0">
            <div class="d-flex flex-column justify-content-center align-items-center bg-transparent" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-light" style="font-size: 1.1em; width: 100%">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center">
                        <h3 class="mb-20">{{ __('Salės Id') }}: {{ $hall->id ?? '?'}}</h3>
                        <div class="d-flex" style="gap: 10px">
                            <a class="fw-bold fs-4 text-center btn-hover-focus" href="{{ route('admin.fiztren') }}"
                               style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 25px; width: 150px; text-decoration: none">
                                {{ __('Atgal') }}
                            </a>
                        </div>
                    </div>
                    <div class="p-4 w-100">
                        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-center my-3" style="gap: 15px">
                            <div class="d-flex flex-column w-100 mb-30">
                                <h4>{{ __('Sukurti nepasiekiamą datą') }}</h4>
                                @include('admin.fiztren.unavailable_date_form')
                            </div>
                            <div class="d-flex flex-column w-100">
                                <h4 class="m-1">{{ __('Nepasiekiamos datos laikai') }}</h4>
                                @include('admin.fiztren.unavailable_dates')
                            </div>
                        </div>
                    </div>
                    <div class="w-100 bg-dark" style="height: 1px"></div>
                    <div class="p-4 w-100">
                        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-start my-3" style="gap: 15px">
                            <div class="d-flex flex-column w-100 mt-50 mb-30">
                                <h4>{{ __('Sukurti nepasiekiamos datos laiką') }}</h4>
                                @include('admin.fiztren.unavailable_datetime_form')
                            </div>
                            <div class="d-flex flex-column w-100">
                                <h4 class="m-1">{{ __('Nepasiekiamos datos laikai') }}</h4>
                                @include('admin.fiztren.unavailable_datetimes')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
