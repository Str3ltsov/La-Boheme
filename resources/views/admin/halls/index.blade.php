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
                @include('admin.halls.messages')
            </div>
            <div class="card p-4">
                <div class="d-flex justify-content-between">
                    <h5 class="m-1">{{ __('Salės') }}</h5>
                    {!! Form::open(['route' => ['admin.halls.create'], 'method' => 'post']) !!}
                        {!! Form::button(__('Sukurti'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="d-flex justify-content-center align-items-center my-3">
                    <div class="d-flex flex-column w-100 me-3">
                        @include('admin.halls.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
