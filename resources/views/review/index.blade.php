@extends('layouts.app')
@section('content')
    <h2 class="mt-0 pl-0 pr-0 pl-xs-20 pr-xs-20">{{ __('Reservation review') }}</h2>
    <div class="p-20 pl-30 pr-30 mt-40 col-md-6" style="background-color: #F6F7F3; border-radius: 10px;">
        @include('flash_message')
        {!! Form::open(['route' => ['reservationReviewSave', $reservation->id], 'method' => 'put']) !!}
            <div class="pt-100 pb-100" style="display: flex; align-items: center; justify-content: center; flex-direction: column">
                <h3 class="m-0 p-0">{{ __('Please rate your coach reservation') }}</h3>
                <div class="rating">
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1" checked><label for="1">☆</label>
                </div>
                @error('rating')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div style="display: flex">
                {!! Form::button(__('Submit'), [
                'type' => 'submit',
                'class' => 'fw-bold btn-hover-focus',
                'style' => 'background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 100px'
                ]) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }
        .rating > input {
            display: none;
        }
        .rating > label {
            position: relative;
            width: 1.1em;
            font-size: 4rem;
            cursor: pointer;
        }
        .rating > label::after {
            content: "\2605";
            position: absolute;
            color: gray;
            opacity: 1;
            z-index: 0;
            top: 0;
            left: 0;
        }
        .rating > label::before {
            content: "\2605";
            position: absolute;
            color: #fdab00;
            opacity: 0;
            z-index: 1;
        }
        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
            opacity: 1 !important;
        }
        .rating > input:checked ~ label:before{
            opacity: 1;
        }
        .rating:hover > input:checked ~ label:before{
            opacity: 0;
        }
    </style>
@endsection
