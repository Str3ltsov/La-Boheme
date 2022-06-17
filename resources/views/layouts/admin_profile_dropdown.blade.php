<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('admin.home') }}">
            {{ __('Namo') }}
        </a>
        <a class="dropdown-item" href="{{ route('admin.reservations') }}">
            {{ __('Reservacijos') }}
        </a>
        <a class="dropdown-item" href="{{ route('admin.tables') }}">
            {{ __('Stalos') }}
        </a>
        <a class="dropdown-item" href="{{ route('admin.halls') }}">
            {{ __('Salės') }}
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Atsijungti') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
