@extends('layouts.app')

@section('content')
    <div>
        <h2 class="mt-0">{{ __('Prisijungti kaip administratorius') }}</h2>
        <div class="p-20 mt-40" style="background-color: #F6F7F3; border-radius: 10px;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email">{{ __('El. pašto adresas') }}</label>
                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           style="border-radius: 5px;">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="password">{{ __('Slaptažodis') }}</label>
                    <div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password" style="border-radius: 5px;">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                {{ __('Prisimink mane') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn-hover-focus" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px;">
                        {{ __('Prisijungti') }}
                    </button>
{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-link fs-3 p-0 text-start" href="{{ route('password.request') }}" style="color: #C19F5F">--}}
{{--                                            {{ __('Pamiršai slaptažodį?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
                </div>
            </form>
        </div>
    </div>
@endsection
