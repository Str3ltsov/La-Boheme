@if (session()->has('success'))
    <div class="alert alert-success" id="message">
        {{ session()->get('success') }}
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger" id="message">
        {{ session()->get('error') }}
    </div>
@endif
