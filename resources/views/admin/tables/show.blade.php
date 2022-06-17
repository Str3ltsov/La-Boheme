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
                @include('admin.tables.messages')
            </div>
            <div class="card p-4">
                <div class="d-flex justify-content-center align-items-center my-3">
                    <div class="d-flex flex-column w-100 me-3 ">
                        <h5>{{ __('Sukurti nepasiekiamą datą') }}</h5>
                        @include('admin.tables.unavailable_date_form')
                    </div>
                    <div class="d-flex flex-column w-100 me-3">
                        <h5>{{ __('Sukurti nepasiekiamos datos laiką') }}</h5>
                        @include('admin.tables.unavailable_datetime_form')
                    </div>
                </div>
            </div>
            <div class="card p-4">
                <div class="d-flex justify-content-between">
                    <h5 class="m-1">{{ __('Stalo Id') }}: {{ $table->id }}</h5>
                    <div class="d-flex" style="gap: 10px">
                        <a class="btn btn-primary" href="{{ route('admin.tables') }}">Atgal</a>
                        {!! Form::open(['route' => ['admin.tables.destroy', $table->id], 'method' => 'delete']) !!}
                            {!! Form::button(__('Ištrinti'), [
                                'type' => 'submit',
                                'class' => 'btn btn-danger',
                                'onclick' => "return confirm('Ar jus tikrai norite?')"
                                ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center my-3">
                    <div class="d-flex flex-column w-100 me-3">
                        <h5 class="m-1">{{ __('Nepasiekiamos datos') }}</h5>
                        @include('admin.tables.unavailable_dates')
                    </div>
                    <div class="d-flex flex-column w-100 me-3">
                        <h5 class="m-1">{{ __('Nepasiekiamos datos laikai') }}</h5>
                        @include('admin.tables.unavailable_datetimes')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
