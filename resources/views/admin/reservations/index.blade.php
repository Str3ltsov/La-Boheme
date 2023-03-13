@extends('layouts.app')

@section('divider-text-1')
    {{ __('Admin panel') }}
@endsection

@section('divider-text-2')
    {{ __('Reservations') }}
@endsection

@section('content')
    <div class="container" style="padding-inline: 0">
        <div class="d-flex flex-column justify-content-start pl-20 pr-20 pr-lg-0 pl-lg-0" style="min-height: 100%; padding: 0">
            <div class="d-flex flex-column justify-content-center align-items-center bg-transparent" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-light" style="font-size: 1.1em; width: 100%">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    @include('admin.reservations.table')
                </div>
            </div>
        </div>
    </div>
@endsection
