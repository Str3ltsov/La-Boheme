@extends('layouts.app')

@section('divider-text-1')
    {{ __('Admin panel') }}
@endsection

@section('divider-text-2')
    {{ __('Head coach assistants') }}
@endsection

@section('content')
    <div class="container" style="padding-inline: 0">
        <div class="d-flex flex-column justify-content-start pl-20 pr-20 pr-lg-0 pl-lg-0"
             style="min-height: 100%; padding: 0">
            <div class="d-flex flex-column justify-content-center align-items-center bg-transparent" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-light"
                     style="font-size: 1.1em; width: 100%">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div class="coach-header">
                        <h3 class="mb-20">{{ __('Head coach assistant') }}: {{ $assistant->id ?? '?'}}</h3>
                        <div style="display: flex; gap: 12px">
                            @if ($assistant->cv)
                                <a class="fw-bold fs-4 text-center btn-hover-focus" href="{{ asset($assistant->cv) }}"
                                   target="_blank" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 8px 30px;; text-decoration: none">
                                    {{ __('View CV') }}
                                </a>
                            @endif
                            <a class="fw-bold fs-4 text-center btn-hover-focus"
                               href="{{ route('vyrtrenasss.edit', $assistant->id) }}"
                               style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 8px 30px;; text-decoration: none">
                                {{ __('Edit') }}
                            </a>
                            <a class="fw-bold fs-4 text-center btn-hover-focus" href="{{ route('vyrtrenasss.index') }}"
                               style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 8px 30px; text-decoration: none">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-column w-100 p-4 mb-100 mt-10">
                        <h4 class="">{{ __('Information') }}</h4>
                        <div style="display: flex; gap: 20px">
                            <div>
                                <img
                                    src="@if ($assistant->avatar) {{ asset($assistant->avatar) }} @else {{ asset('images/avatars/no_avatar.png') }} @endif"
                                    alt="{{ $assistant->first_name.' '.$assistant->last_name }}"
                                    style="width: 110px; height: 110px; border-radius: 55px; ; object-fit: cover">
                            </div>
                            <div class="d-flex flex-column" style="gap: 10px">
                                <div class="d-flex flex-lg-row flex-column">
                                    <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Name') }}:</span>
                                    <span
                                        style="width: clamp(250px, 100%, 500px); color: #444">{{ $assistant->first_name.' '.$assistant->last_name ?? '-' }}</span>
                                </div>
                                <div class="d-flex flex-lg-row flex-column">
                                    <span
                                        style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Available') }}:</span>
                                    <span
                                        style="width: clamp(250px, 100%, 500px); color: #444">{{ $assistant->available ? __('Yes') : __('No') }}</span>
                                </div>
                                <div class="d-flex flex-lg-row flex-column">
                                    <span
                                        style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Created') }}:</span>
                                    <span
                                        style="width: clamp(250px, 100%, 500px); color: #444">{{ $assistant->created_at ?? '-' }}</span>
                                </div>
                                <div class="d-flex flex-lg-row flex-column">
                                    <span
                                        style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Updated') }}:</span>
                                    <span
                                        style="width: clamp(250px, 100%, 500px); color: #444">{{ $assistant->updated_at ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 w-100">
                        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-center my-3 fs-4"
                             style="gap: 15px">
                            <div class="d-flex flex-column w-100 mb-30">
                                <h4>{{ __('Add unavailable Date') }}</h4>
                                @include('admin.vyrtrenass.unavailable.unavailable_date_form')
                            </div>
                            <div class="d-flex flex-column w-100">
                                <h4 class="m-1">{{ __('Unavailable dates') }}</h4>
                                @include('admin.vyrtrenass.unavailable.unavailable_dates')
                            </div>
                        </div>
                    </div>
                    <div class="w-100 bg-dark" style="height: 1px"></div>
                    <div class="p-4 w-100">
                        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-start my-3"
                             style="gap: 15px">
                            <div class="d-flex flex-column w-100 mt-50 mb-30">
                                <h4>{{ __('Add unavailable date time') }}</h4>
                                @include('admin.vyrtrenass.unavailable.unavailable_datetime_form')
                            </div>
                            <div class="d-flex flex-column w-100">
                                <h4 class="m-1">{{ __('Unavailable date times') }}</h4>
                                @include('admin.vyrtrenass.unavailable.unavailable_datetimes')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
