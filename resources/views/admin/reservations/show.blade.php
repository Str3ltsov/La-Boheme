@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center h-100 p-4">
            <h1 class="fw-bolder">{{ __('Paslaugos užsakymas') }}</h1>
            <p class="fs-5">{{ __('Staliuko rezervacija ar šventės užsakymas') }}</p>
        </div>
        <div class="d-flex flex-column justify-content-center h-100">
            <h4 class="pb-4">{{ __('Administratoriaus paskyra') }}</h4>
            <div>
                @include('admin.reservations.messages')
            </div>
            <div class="card p-4">
                <div class="d-flex justify-content-between">
                    <h5 class="m-1">{{ __('Paslauga') }}: {{ $reservation->id }}</h5>
                    <a class="btn btn-primary" href="{{ route('admin.reservations') }}">{{ __('Atgal') }}</a>
                </div>
                <div class="d-flex justify-content-center align-items-baseline my-3">
                    <div class="d-flex flex-column w-100 me-3">
                        <h5>{{ __('Paslauga') }}</h5>
                        <div class="d-flex" style="gap: 20px">
                            <div class="d-flex flex-column">
                                <span>{{ __('Pradžios data ir  laikas') }}:</span>
                                <span>{{ __('Pabaigos data ir laikas') }}:</span>
                                <span>{{ __('Žmonių skaičius') }}:</span>
                                <span>{{ __('Įvertinimas') }}:</span>
                                <span>{{ __('Tipas') }}:</span>
                                <span>{{ __('Statusas') }}:</span>
                            </div>
                            <div class="d-flex flex-column">
                                <span>{{ $reservation->start_datetime ?? '-' }}</span>
                                <span>{{ $reservation->end_datetime ?? '-' }}</span>
                                <span>{{ $reservation->number_of_people ?? '-' }}</span>
                                <span>{{ $reservation->rating ?? '-' }}</span>
                                <span>{{ $reservation->type->name ?? '-' }}</span>
                                <span>{{ $reservation->status->name ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column w-100 me-3">
                        <h5>{{ __('Klientas') }}</h5>
                        <div class="d-flex" style="gap: 20px">
                            <div class="d-flex flex-column">
                                <span>{{ __('Vardas') }}:</span>
                                <span>{{ __('El. paštas') }}:</span>
                                <span>{{ __('Telefonas') }}:</span>
                                <span>{{ __('Papildoma informacija') }}:</span>
                            </div>
                            <div class="d-flex flex-column">
                                <span>{{ $reservation->client->name ?? '-' }}</span>
                                <span>{{ $reservation->client->email ?? '-' }}</span>
                                <span>{{ $reservation->client->phone_number ?? '-' }}</span>
                                <span>{{ $reservation->client->additonal_information ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
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
                </div>
                <div class="d-flex justify-content-center align-items-baseline my-3">
                    <div class="d-flex flex-column w-100 me-3">
                        <h5>{{ __('Klausimų atsakymai') }}</h5>
                        <div class="d-flex" style="gap: 20px">
                            <div class="d-flex flex-column">
                                @forelse( $reservationQuestionsAnswers ?? [] as $reservationQuestion )
                                    <span>{{ __($reservationQuestion->question) ?? '-' }} :</span>
                                @empty
                                    <span>{{ __('No reservation questions found') }}</span>
                                @endforelse
                            </div>
                            <div class="d-flex flex-column">
                                @forelse( $reservationQuestionsAnswers ?? [] as $reservationQuestionAnswer )
                                    <span>{{ $reservationQuestionAnswer->answer ?? '-' }}</span>
                                @empty
                                    <span>{{ __('No reservation question answers found') }}</span>
                                @endforelse
                            </div>
                            <div class="d-flex flex-column">
                                @forelse( $reservationQuestionsAnswers ?? [] as $reservationQuestionComment )
                                    <span>{{ $reservationQuestionComment->comment ?? '-' }}</span>
                                @empty
                                    <span>{{ __('No reservation question comments found') }}</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
