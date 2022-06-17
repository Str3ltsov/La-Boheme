@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    @if (session()->has('error'))
                        <div class="alert alert-danger" id="error">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Prietaisų skydelis') }}</div>
                    <div class="card-body">
                        <p>{{ __('Jei norite rezervuoti, paspauskite ant Rezervacija.') }}</p>
                        <p>{{ __('Galite prisijungti kaip administratorius su parametrais: andtaress2@gmail.com, caveman123') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        setTimeout(function() {
            document.getElementById('error').style.display = 'none';
        }, 3000);
    </script>
@endpush
