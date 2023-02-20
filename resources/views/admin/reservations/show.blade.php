@extends('layouts.app')

@section('divider-text-1')
    {{ __('Administratoriaus paskyra') }}
@endsection

@section('divider-text-2')
    {{ __('Paslaugų užsakymai') }}
@endsection

@section('content')
    <div class="container" style="padding-inline: 0">
        <div class="d-flex flex-column justify-content-start pl-20 pr-20 pr-lg-0 pl-lg-0" style="min-height: 100%;">
            <div class="d-flex flex-column justify-content-center align-items-center bg-transparent" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-start fs-5 text-light" style="font-size: 1.1em; width: 100%">
                    <div class="d-flex flex-column justify-content-center align-items-start fs-4 w-100">
                        <h2 class="text-light">{{ __('Reservacija:') }} {{$reservation->id ?? '?'}}</h2>
                        <div class="d-flex flex-md-row flex-column w-100">
                            <div class="d-flex flex-column w-100">
                                <h4 class="">{{ __('Paslauga') }}</h4>
                                <div class="d-flex flex-column" style="gap: 10px">
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Pradžios data ir  laikas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->start_datetime ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Pabaigos data ir laikas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->end_datetime ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Žmonių skaičius') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->number_of_people ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Reservacijos tipas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->type->name ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Statusas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->status->name ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100 me-3 my-3 my-lg-0">
                                <h4>{{ __('Klientas') }}</h4>
                                <div class="d-flex flex-column" style="gap: 10px">
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Vardas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->client->name ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('El. paštas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->client->email ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Telefonas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->client->phone_number ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Papildoma informacija') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->client->additional_information ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            {{--
                            <div class="d-flex flex-column w-100 me-3">
                                <h5>{{ __('Darbuotojai') }}</h5>
                                <div class="d-flex" style="gap: 20px">
                                    <div class="d-flex flex-column">
                                        @forelse( $reservationEmployees ?? [] as $reservationEmployee)
                                            <span>{{ $reservationEmployee->type->name ?? '-' }}:</span>
                                        @empty
                                            <span>{{ __('No reservation employee types found') }}</span>
                                        @endforelse
                                    </div>
                                    <div class="d-flex flex-column">
                                        @forelse( $reservationEmployees ?? [] as $reservationEmployee)
                                            <span>{{ $reservationEmployee->name ?? '-' }}</span>
                                        @empty
                                            <span>{{ __('No reservation employee names found') }}</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>
                        <div class="d-flex align-items-baseline my-3 w-100">
                            <div class="d-flex flex-column w-100 me-3">
                                <h4>{{ __('Klausimų atsakymai') }}</h4>
                                <div class="d-flex flex-column" style="gap: 20px">
                                    @forelse( $reservationQuestionsAnswers ?? [] as $reservationQuestion )
                                        <div class="d-flex flex-lg-row flex-column my-3 my-lg-0" style="word-break: break-word">
                                            <span style="width: clamp(250px, 100%, 500px); color: #999">
                                                {{ __($reservationQuestion->question) ?? '-' }} :
                                            </span>
                                            <span style="width: clamp(250px, 100%, 500px); color: #444; padding-inline: 10px">
                                                {{ $reservationQuestion->answer ?? '-' }}
                                            </span>
                                            <span style="width: clamp(250px, 100%, 500px); color: #444; padding-inline: 10px">
                                                {{ $reservationQuestion->comment ?? '-' }}
                                            </span>
                                        </div>
                                    @empty
                                        <span>{{ __('Nerasta rezervavimo klausimų') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100 mt-30" style="gap: 20px;">
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="fw-bold fs-4 text-center btn-hover-focus" href="{{ route('admin.reservations') }}"
                               style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 30px; width: 150px; text-decoration: none">
                                {{ __('Atgal') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
