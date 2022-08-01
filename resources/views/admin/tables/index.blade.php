@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-center align-items-center text-center p-5" style="height: 300px">
            <p class="fs-2 text-light" id="cormorant">{{ __('Administratoriaus paskyra') }}</p>
            <p class="fs-2 text-light" id="cormorant">{{ __('Stalai') }}</p>
        </div>
        <img src="/images/grunge-dark-temp.png" alt="grunge-dark-temp"
             style="width: 100%; display: flex; align-items: flex-end">
        <div class="d-flex flex-column justify-content-start"
             style="background-color: #0F0E0F; min-height: 65vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent p-4" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-light p-5"
                     style="font-size: 1.3em; background-color: #151515; width: clamp(400px, 100%, 1200px)">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div class="d-flex justify-content-center justify-content-md-end w-100 mb-4">
                        {!! Form::open(['route' => ['admin.tables.create'], 'method' => 'post']) !!}
                            {!! Form::button(__('Sukurti'), ['type' => 'submit', 'class' => 'fw-bold fs-4 text-center',
                                'style' => 'background-color: #C19F5F; border: none; border-radius: 17.5px;
                                color: black; padding: 10px 0; width: 150px; text-decoration: none']) !!}
                        {!! Form::close() !!}
                    </div>
                    @include('admin.tables.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
@endpush
