<nav class="navbar navbar-expand-lg navbar-dark bg-black px-5 bg-opacity-50">
    <div class="container-fluid">
        @guest
            <a class="d-lg-none m-0" href="{{ route('livewire.reservation') }}" style="width: clamp(120px, 50%, 220px)">
                <img src="/images/logo.png" alt="Logo" style="width: clamp(120px, 50%, 220px)">
            </a>
        @endguest
        @auth
            <a class="d-lg-none m-0" href="{{ route('admin.home') }}" style="width: clamp(120px, 50%, 220px)">
                <img src="/images/logo.png" alt="Logo" style="width: clamp(120px, 50%, 220px)">
            </a>
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto py-3" style="list-style: none">
                @guest
                    <a class="navbar-brand d-none d-lg-block me-5" href="{{ route('livewire.reservation') }}">
                        <img src="/images/logo.png" alt="Logo" width="220px">
                    </a>
                @endguest
                @auth
                    <a class="navbar-brand d-none d-lg-block me-5" href="{{ route('admin.home') }}">
                        <img src="/images/logo.png" alt="Logo" width="220px">
                    </a>
                @endauth
                @auth
                    @include('layouts.admin_profile_dropdown')
                @endauth
                @include('layouts.menu')
                @include('layouts.icons')
            </ul>
        </div>
    </div>
</nav>
