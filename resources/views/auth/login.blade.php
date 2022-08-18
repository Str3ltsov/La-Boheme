@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-center align-items-center text-center p-5" style="height: 200px">
            <h1 class="text-light" id="cormorant">{{ __('Prisijungti kaip administratorius') }}</h1>
        </div>
        <img src="/images/grunge-dark-temp.png" alt="grunge-dark-temp"
             style="width: 100%; display: flex; align-items: flex-end">
        <div class="d-flex flex-column justify-content-start"
             style="background-color: #0F0E0F; min-height: 85vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent p-4" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-center
                my-1 fs-5 text-light" style="font-size: 1.1em; width: clamp(300px, 100%, 600px)">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center my-3 fs-4 w-100">
                        <form method="POST" action="{{ route('login') }}">
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
                            <div class="row mb-3">
                                <label for="password" class="col-form-label">{{ __('Slaptažodis') }}</label>
                                <div>
                                    <input id="password" type="password" class="form-control fs-4 text-light bg-transparent
                                           @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password"
                                           style="border-radius: 15px; border-color: #C19F5F">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Prisimink mane') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center w-100" style="gap: 20px">
                                    <button type="submit" class="fw-bold fs-4 btn-hover-focus"
                                            style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                                            color: black; padding: 10px; width: 130px;">
                                        {{ __('Prisijungti') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link fs-3 p-0 text-start" href="#{{-- route('password.request') --}}" style="color: #C19F5F">
                                            {{ __('Pamiršai slaptažodį?') }}
                                        </a>
                                    @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
