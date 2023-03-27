@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible" role="alert" id="message">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible" role="alert" id="message">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert" id="message">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible" role="alert" id="message">
        <strong>{{ $message }}</strong>
    </div>
@endif

@push('scripts')
    <script>
        setTimeout(() => document.getElementById('message').style.display = 'none', 1000 * 5);
    </script>
@endpush
