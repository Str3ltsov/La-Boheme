@extends('layouts.app')

@section('divider-text-1')
    {{ __('Administratoriaus paskyra') }}
@endsection

@section('divider-text-2')
    {{ __('Paslaugų užsakymai') }}
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center"
         style="min-height: 100%" id="cormorant">
        <div class="d-flex justify-content-center align-items-center w-auto">
            <div>
                <div class="w-100">
                    @include('flash_message')
                </div>
                <div class="d-flex flex-column justify-content-center
                align-items-center text-center text-light" style="gap: 10px">
                    <h1>
                        {{ __('Dabar esate prisijungę kaip administratorius!') }}
                    </h1>
                    <h1>
                        {{ __('Visos administratoriaus puslapiai yra parodomas žemiau') }}
                    </h1>
                    <div class="d-flex justify-content-center mb-5 flex-wrap w-auto" style="gap: 20px;" id="cormorant">
                        <a class="fw-bold fs-3 bg-black bg-opacity-50" href="{{ route('admin.reservations') }}"
                           style="border: 1px solid #C19F5F; border-radius: 5px; color: #C19F5F; padding: 10px 0; width: 160px; text-decoration: none">
                            {{ __('Reservacijos') }}
                        </a>
                        <a class="fw-bold fs-3 bg-black bg-opacity-50" href="{{ route('admin.vyrtrens') }}"
                           style="border: 1px solid #C19F5F; border-radius: 5px; color: #C19F5F; padding: 10px 0; width: 160px; text-decoration: none">
                            {{ __('Vyriausi treneriai') }}
                        </a>
                        <a class="fw-bold fs-3 bg-black bg-opacity-50" href="{{ route('admin.vyrtrenasss') }}"
                           style="border: 1px solid #C19F5F; border-radius: 5px; color: #C19F5F; padding: 10px 0; width: 160px; text-decoration: none">
                            {{ __('Vyriausių trenerių asistentai') }}
                        </a>
                        <a class="fw-bold fs-3 bg-black bg-opacity-50" href="{{ route('admin.fiztren') }}"
                           style="border: 1px solid #C19F5F; border-radius: 5px; color: #C19F5F; padding: 10px 0; width: 160px; text-decoration: none">
                            {{ __('Fizinio rengimo treneriai') }}
                        </a>
                    </div>
                    <h1>
                        {{ __('Jeigu norite atsijungti, paspauskite ant mygtuką "Atsijungti"') }}
                    </h1>
                    <a class="fw-bold fs-3 bg-black bg-opacity-50" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       style="border: 1px solid #C19F5F; border-radius: 5px; color: #C19F5F; padding: 10px 0; width: 160px; text-decoration: none">
                        {{ __('Atsijungti') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
