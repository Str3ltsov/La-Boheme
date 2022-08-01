@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-center align-items-center text-center p-5" style="height: 200px">
            <h1 class="text-light" id="cormorant">{{ __('Registruotis') }}</h1>
        </div>
        <img src="/images/grunge-dark-temp.png" alt="grunge-dark-temp"
             style="width: 100%; display: flex; align-items: flex-end">
        <div class="d-flex flex-column justify-content-start"
             style="background-color: #0F0E0F; min-height: 65vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent p-4" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-center
                mb-5 fs-5 text-light" style="font-size: 1.1em; width: clamp(300px, 100%, 600px)">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center my-3 fs-4 w-100">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                <div>
                                    <input id="name" type="text" class="form-control fs-4 text-light bg-transparent
                                           @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                           style="border-radius: 15px; border-color: #C19F5F"
                                           required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                <div>
                                    <input id="email" type="email" class="form-control fs-4 text-light bg-transparent
                                           @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                           style="border-radius: 15px; border-color: #C19F5F"
                                           required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <div>
                                    <input id="password" type="password" class="form-control fs-4 text-light bg-transparent
                                           @error('password') is-invalid @enderror"
                                           style="border-radius: 15px; border-color: #C19F5F"
                                           name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                                <div>
                                    <input id="password-confirm" type="password" class="form-control fs-4 text-light bg-transparent"
                                           name="password_confirmation" required autocomplete="new-password"
                                           style="border-radius: 15px; border-color: #C19F5F">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-5">
                                <div>
                                    <button type="submit" class="fw-bold fs-3" style="background-color: #C19F5F; border: none;
                                            border-radius: 17.5px; color: black; padding: 10px; width: 170px;">
                                        {{ __('Registruotis') }}
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

