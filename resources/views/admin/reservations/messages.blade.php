@if($errors->any())
    <div class="alert alert-danger" id="message">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success" id="message">
        {{ session()->get('success') }}
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger" id="message">
        {{ session()->get('error') }}
    </div>
@endif

@push('scripts')
    <script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
@endpush
