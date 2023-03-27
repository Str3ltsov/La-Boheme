@extends('layouts.app')

@section('divider-text-1')
    {{ __('Admin panel') }}
@endsection

@section('divider-text-2')
    {{ __('Reservations') }}
@endsection

@section('content')
    <div class="container" style="padding-inline: 0">
        <div class="d-flex flex-column justify-content-start pl-20 pr-20 pr-lg-0 pl-lg-0 pb-15" style="min-height: 100%;">
            <div class="d-flex flex-column justify-content-center align-items-center bg-transparent" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-start fs-5 text-light" style="font-size: 1.1em; width: 100%">
                    <div class="d-flex flex-column justify-content-center align-items-start fs-4 w-100">
                        <div style="display: flex; justify-content: space-between; align-items: center">
                            <h2 class="text-light">{{ __('Reservation:') }} {{$reservation->id ?? '?'}}</h2>
                            <a class="fw-bold fs-4 text-center btn-hover-focus" href="{{ route('admin.reservations') }}"
                               style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 8px 30px; text-decoration: none">
                                {{ __('Back') }}
                            </a>
                        </div>
                        <div class="d-flex flex-md-row flex-column w-100">
                            <div class="d-flex flex-column w-100">
                                <h4 class="">{{ __('Service') }}</h4>
                                <div class="d-flex flex-column" style="gap: 10px">
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Status') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->status->name ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Type') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->type->name ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Coach') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">
                                            @if ($reservation->type->id == \App\Helpers\Constants::reservationTypeVyrtren)
                                                {{ $reservation->vyrtren->first_name.' '.$reservation->vyrtren->last_name ?? '-' }}
                                            @elseif ($reservation->type->id == \App\Helpers\Constants::reservationTypeVyrtrenass)
                                                {{ $reservation->vyrtrenass->first_name.' '.$reservation->vyrtrenass->last_name ?? '-' }}
                                            @elseif ($reservation->type->id == \App\Helpers\Constants::reservationTypeFiztren)
                                                {{ $reservation->fiztren->first_name.' '.$reservation->fiztren->last_name ?? '-' }}
                                            @endif
                                        </span>
                                    </div>
                                    <div style="display: flex; align-items: center">
                                        <span style="color: #999">{{ __('Rating') }}:</span>
                                        <span class="ml-5" style="color: #222">{{ $reservation->rating ?? 0 }}</span>
                                        <span style="color: #222">/</span>
                                        <span style="color: #222">5</span>
                                        @if ($reservation->rating > 0)
                                            <i class="fa-solid fa-star ml-5" style="color: #f8ae00"></i>
                                        @else
                                            <i class="fa-regular fa-star ml-5" style="color: #f8ae00"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100 me-3 my-3 my-lg-0">
                                <h4>{{ __('Client') }}</h4>
                                <div class="d-flex flex-column" style="gap: 10px">
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Name') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->client->name ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Email') }}:</span>
                                        <a href="mailto:{{ $reservation->client->email }}" style="width: clamp(250px, 100%, 500px); color: #444">
                                            {{ $reservation->client->email ?? '-' }}
                                        </a>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Phone') }}:</span>
                                        <span style="width: clamp(250px, 100%, 500px); color: #444">{{ $reservation->client->phone_number ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex flex-lg-row flex-column">
                                        <span style="width: clamp(250px, 100%, 500px); color: #999">{{ __('Additional information') }}:</span>
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
                                <h4>{{ __('Question answers') }}</h4>
                                <div style="display: flex; flex-direction: column; gap: 5px">
                                    @forelse( $reservationQuestionsAnswers ?? [] as $reservationQuestion )
                                        <div style="display: flex; flex-direction: column">
                                            <span style="width: clamp(250px, 100%, 500px); color: #999">
                                                {{ __($reservationQuestion->question) ?? '-' }}:
                                            </span>
                                            <span style="width: clamp(250px, 100%, 500px); color: #444">
                                                {{ $reservationQuestion->answer ?? '-' }}
                                            </span>
{{--                                            <span style="width: clamp(250px, 100%, 500px); color: #444; padding-inline: 10px">--}}
{{--                                                {{ $reservationQuestion->comment ?? '-' }}--}}
{{--                                            </span>--}}
                                        </div>
                                    @empty
                                        <span>{{ __('Question answers not found') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
