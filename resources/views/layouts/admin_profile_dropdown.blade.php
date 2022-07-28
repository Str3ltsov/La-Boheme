<li class="nav-item me-lg-5 d-flex flex-column flex-lg-row justify-content-sm-center align-items-lg-center dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-end bg-black bg-opacity-50" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('admin.reservations') }}"
           style="color: {{ request()->is('admin/reservations') ? '#C19F5F' : '#FFFFFF' }}">
            {{ __('Reservacijos') }}
        </a>
        <a class="dropdown-item" href="{{ route('admin.tables') }}"
           style="color: {{ request()->is('admin/tables') ? '#C19F5F' : '#FFFFFF' }}">
            {{ __('Stalos') }}
        </a>
        <a class="dropdown-item" href="{{ route('admin.halls') }}"
           style="color: {{ request()->is('admin/halls') ? '#C19F5F' : '#FFFFFF' }}">
            {{ __('Salės') }}
        </a>
        <hr class="d-none d-lg-block dropdown-divider">
        <a class="dropdown-item text-light" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Atsijungti') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
