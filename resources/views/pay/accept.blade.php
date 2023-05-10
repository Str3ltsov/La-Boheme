@extends('layouts.app')

@section('content')
    <div class="w-100">
        @include('flash_message')
    </div>
    <h2 class="mt-0 pl-0 pr-0 pl-xs-20 pr-xs-20">{{ __('Payment information') }}</h2>
    <div class="p-20 mt-40" style="background-color: #F6F7F3; border-radius: 10px;">
        <div style="display: flex; flex-wrap: wrap; font-size: .9rem">
            <div class="column" style="display: flex; flex-direction: column">
                <h5 class="text-uppercase">{{ __('Buyer') }}</h5>
                <div class="d-flex flex-column text-gray">
                    <div>{{ $reservation->client->name }}</div>
                    <div>{{ __('Phone: ').$reservation->client->phone_number }}</div>
                </div>
            </div>
            <div class="column" style="display: flex; flex-direction: column">
                <h5 class="text-uppercase">{{ __('Payment') }}</h5>
                <div class="d-flex flex-column text-gray">
                    <div>{{ __('Order paid.') }}</div>
                    <div>{{ now()->format('Y-m-d') }}</div>
                    <div>{{ __('Paysera') }}</div>
                    <div>{{ __('Total 	200,00 €') }}</div>
                </div>
            </div>
            <div class="column" style="display: flex; flex-direction: column">
                <h5 class="text-uppercase">{{ __('Ordered service') }}</h5>
                <p>
                    @if ($reservation->vyrtren_id)
                        {{ __('Head coach ').$reservation->vyrtren->first_name.' '.$reservation->vyrtren->last_name.__(' reservation') }}
                    @elseif ($reservation->vyrtrenass_id)
                        {{ __('Head coach assistant ').$reservation->vyrtrenass->first_name.' '.$reservation->vyrtrenass->last_name.__(' reservation') }}
                    @else
                        {{ __('Physical training coach ').$reservation->fiztren->first_name.' '.$reservation->fiztren->last_name.__(' reservation') }}
                    @endif
                </p>
            </div>
            <div class="column" style="display: flex; flex-direction: column">
                <h5 class="text-uppercase">{{ __('Documents') }}</h5>
                <a href="{{ route('downloadInvoice', $id) }}" class="text-danger" style="text-decoration: underline">{{ __('VAT Invoice') }}</a>
            </div>
        </div>
        <hr>
        <div style="display: flex">
            <a href="{{ url('/') }}" class="fw-bold fs-4 btn-hover-focus text-center" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 170px">
                {{ __('Close') }}
            </a>
        </div>
    </div>

    <style>
        .main_body {
            background-image: none;
        }

        @media screen and (min-width: 768px) {
            .column {
                width: 50%;
            }
        }

        @media screen and (max-width: 768px) {
            .column {
                width: 100%;
            }
        }
    </style>
@endsection