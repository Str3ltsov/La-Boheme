@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center h-100 p-4">
            <h1 class="fw-bolder">Paslaugos užsakymas</h1>
            <p class="fs-5">Staliuko rezervacija ar šventės užsakymas</p>
        </div>
        <div class="d-flex flex-column justify-content-center h-100">
            <h4 class="pb-4">Paslaugos užsakymas</h4>
            <div class="card p-4">
                <div>
                    @if (session()->has('success'))
                        <div class="alert alert-success" id="message">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger" id="message">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-column justify-content-center align-items-start my-3 fs-5">
                    <div class="d-flex flex-column" style="gap: 10px;">
                        <p>
                            Jūsų paslauga sėkmingai išsaugota. Netrukus el. paštu gausite administratoriaus patvirtinimą.
                        </p>
                        <p>
                            Norėdami atsisakyti paslaugos galite:
                        </p>
                        <ol>
                            <li>Susisiekti su mumis telefonu 8-657 56270.</li>
                            <li>Parašyti el. laišką info@laboheme.lt</li>
                            <li>Paspausti šią nuorodą.</li>
                        </ol>
                        <p>
                            Šią informaciją taip pat gausite nurodytu el. paštu.
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" onclick="closeWindow()">Uždaryti langą</button>
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

        function closeWindow() {
            window.location.href = "{{ route('home')}}";
        }
    </script>
@endpush
