@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-center align-items-center text-center p-5" style="height: 300px">
            <p class="fs-2 text-light" id="cormorant">{{ __('Administratoriaus paskyra') }}</p>
            <p class="fs-2 text-light" id="cormorant">{{ __('Paslaugų užsakymai') }}</p>
        </div>
        <img src="/images/grunge-dark-temp.png" alt="grunge-dark-temp"
             style="width: 100%; display: flex; align-items: flex-end">
        <div class="d-flex flex-column justify-content-start"
             style="background-color: #0F0E0F; min-height: 65vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-start
                p-5 fs-5 mb-5 text-light" style="font-size: 1.1em; background-color: #151515; width: clamp(300px, 100%, 1200px)">
                    <div class="d-flex flex-column justify-content-center align-items-start my-3 fs-4 w-100">
                        <h3 class="text-light">{{ __('Reservacija:') }} {{$reservation->id}}</h3>
                        <div class="d-flex flex-md-row flex-column my-3 w-100">
                            <div class="d-flex flex-column w-100 me-3 my-3 my-lg-0">
                                <h5>{{ __('Paslauga') }}</h5>
                                <div class="d-flex flex-column" style="gap: 10px">
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px)">{{ __('Pradžios data ir  laikas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px)">{{ $reservation->start_datetime ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px)">{{ __('Pabaigos data ir laikas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px)">{{ $reservation->end_datetime ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px)">{{ __('Žmonių skaičius') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px)">{{ $reservation->number_of_people ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px)">{{ __('Reservacijos tipas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px)">{{ $reservation->type->name ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px)">{{ __('Statusas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px)">{{ $reservation->status->name ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100 me-3 my-3 my-lg-0">
                                <h5>{{ __('Klientas') }}</h5>
                                <div class="d-flex flex-column" style="gap: 10px">
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px)">{{ __('Vardas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px)">{{ $reservation->client->name ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px)">{{ __('El. paštas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px)">{{ $reservation->client->email ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px)">{{ __('Telefonas') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px)">{{ $reservation->client->phone_number ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px)">{{ __('Papildoma informacija') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px)">{{ $reservation->client->additional_information ?? '-' }}</span>
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
                                <h5>{{ __('Klausimų atsakymai') }}</h5>
                                <div class="d-flex flex-column" style="gap: 20px">
                                    @forelse( $reservationQuestionsAnswers ?? [] as $reservationQuestion )
                                        <div class="d-flex flex-lg-row flex-column my-3 my-lg-0" style="gap: 20px; word-break: break-word">
                                            <span style="width: clamp(250px, 100%, 500px)">{{ __($reservationQuestion->question) ?? '-' }} :</span>
                                            <span style="width: clamp(250px, 100%, 500px)">{{ $reservationQuestion->answer ?? '-' }}</span>
                                            <span style="width: clamp(250px, 100%, 500px)">{{ $reservationQuestion->comment ?? '-' }}</span>
                                        </div>
                                    @empty
                                        <span>{{ __('No reservation questions found') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100 mt-4" style="gap: 20px;">
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="fw-bold fs-4 text-center" href="{{ route('admin.reservations') }}"
                               style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                               color: black; padding: 10px 0; width: 150px; text-decoration: none">
                                {{ __('Atgal') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
