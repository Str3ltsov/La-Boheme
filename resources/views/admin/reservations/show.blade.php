@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center h-100 p-4">
            <h1 class="fw-bolder">Paslaugos užsakymas</h1>
            <p class="fs-5">Staliuko rezervacija ar šventės užsakymas</p>
        </div>
        <div class="d-flex flex-column justify-content-center h-100">
            <h4 class="pb-4">Administratoriaus paskyra</h4>
            <div>
                @include('admin.reservations.messages')
            </div>
            <div class="card p-4">
                <div class="d-flex justify-content-between">
                    <h5 class="m-1">Paslauga: {{ $reservation->id }}</h5>
                    <a class="btn btn-primary" href="{{ route('admin.reservations') }}">Atgal</a>
                </div>
                <div class="d-flex justify-content-center align-items-baseline my-3">
                    <div class="d-flex flex-column w-100 me-3">
                        <h5>Paslauga</h5>
                        <div class="d-flex" style="gap: 20px">
                            <div class="d-flex flex-column">
                                <span>Pradžios data ir  laikas:</span>
                                <span>Pabaigos data ir laikas:</span>
                                <span>Žmonių skaičius:</span>
                                <span>Įvertinimas:</span>
                                <span>Tipas:</span>
                                <span>Statusas:</span>
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
                        <h5>Klientas</h5>
                        <div class="d-flex" style="gap: 20px">
                            <div class="d-flex flex-column">
                                <span>Vardas:</span>
                                <span>El. paštas:</span>
                                <span>Telefono numeris:</span>
                                <span>Papildoma informacija:</span>
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
                        <h5>Darbuotojai</h5>
                        <div class="d-flex" style="gap: 20px">
                            <div class="d-flex flex-column">
                                @forelse( $reservationEmployees ?? [] as $reservationEmployee)
                                    <span>{{ $reservationEmployee->type->name ?? '-' }}:</span>
                                @empty
                                    <span>No reservation employee types found</span>
                                @endforelse
                            </div>
                            <div class="d-flex flex-column">
                                @forelse( $reservationEmployees ?? [] as $reservationEmployee)
                                    <span>{{ $reservationEmployee->name ?? '-' }}</span>
                                @empty
                                    <span>No reservation employee names found</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-baseline my-3">
                    <div class="d-flex flex-column w-100 me-3">
                        <h5>Klausimų atsakymai</h5>
                        <div class="d-flex" style="gap: 20px">
                            <div class="d-flex flex-column">
                                @forelse( $reservationQuestionsAnswers ?? [] as $reservationQuestion )
                                    <span>{{ $reservationQuestion->question ?? '-' }} :</span>
                                @empty
                                    <span>No reservation questions found</span>
                                @endforelse
                            </div>
                            <div class="d-flex flex-column">
                                @forelse( $reservationQuestionsAnswers ?? [] as $reservationQuestionAnswer )
                                    <span>{{ $reservationQuestionAnswer->answer ?? '-' }}</span>
                                @empty
                                    <span>No reservation question answers found</span>
                                @endforelse
                            </div>
                            <div class="d-flex flex-column">
                                @forelse( $reservationQuestionsAnswers ?? [] as $reservationQuestionComment )
                                    <span>{{ $reservationQuestionComment->comment ?? '-' }}</span>
                                @empty
                                    <span>No reservation question comments found</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
