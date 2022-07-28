<li class="nav-item mx-lg-3 ms-lg-5 d-flex align-items-center">
    <a class="nav-link" href="#">
        <span class="text-light">{{ __('Apie') }}</span>
    </a>
</li>
<li class="nav-item mx-lg-3 d-flex align-items-center">
    <a class="nav-link" href="#">
        <span class="text-light" id="meniu">{{ __('Meniu') }}</span>
    </a>
</li>
<li class="nav-item mx-lg-3 d-flex align-items-center">
    <a class="nav-link" href="{{ route('livewire.reservation') }}">
        <span style="color: {{ request()->is('reservation') ? '#C19F5F' : '#FFFFFF' }}">
            {{ __('Rezervacija') }}
        </span>
    </a>
</li>
<li class="nav-item mx-lg-3 d-flex align-items-center">
    <a class="nav-link" href="#">
        <span class="text-light">{{ __('Renginiai') }}</span>
    </a>
</li>
<li class="nav-item mx-lg-3 d-flex align-items-center">
    <a class="nav-link" href="#">
        <span class="text-light">{{ __('Galerija') }}</span>
    </a>
</li>
<li class="nav-item mx-lg-3 me-lg-5 mb-sm-3 mb-lg-0 d-flex align-items-center">
    <a class="nav-link" href="#">
        <span class="text-light">{{ __('Dovanų kuponas') }}</span>
    </a>
</li>

