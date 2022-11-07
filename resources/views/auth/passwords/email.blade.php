@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-center align-items-center text-center p-5" style="height: 200px">
            <h1 class="text-light" id="cormorant">{{ __('Atstatyti slaptažodį') }}</h1>
        </div>
        <img src="/images/grunge-dark-temp.png" alt="grunge-dark-temp"
             style="width: 100%; display: flex; align-items: flex-end">
        <div class="d-flex flex-column justify-content-start"
             style="background-color: #0F0E0F; min-height: 65vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent p-4" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-center
                my-1 fs-5 text-light" style="font-size: 1.1em; width: clamp(300px, 100%, 600px)">
                    <div class="d-flex flex-column justify-content-center align-items-center my-3 fs-4 w-100">
                        <div>
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('status') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-form-label">{{ __('El. pašto adresas') }}</label>
                                <div>
                                    <input id="email" type="email" class="form-control fs-4 text-light bg-transparent
                                           @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                           style="border-radius: 15px; border-color: #C19F5F">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="d-flex flex-column justify-content-center align-items-center" style="gap: 15px">
                                    <button type="submit" class="fw-bold fs-4"
                                            style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                                            color: black; padding: 10px 0; width: 100%">
                                        {{ __('Siųsti slaptažodžio atstatymo nuorodą') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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
