<header id="header" class="header">
    <div class="header-top bg-blue-111 sm-text-center p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="widget no-border m-0">
                        <ul class="list-inline xs-text-center text-white mt-5 mb-5">
                            <li class="m-0 pl-10 pr-10">
                                <a href="tel:+37068610246" class="text-white">
                                    <i class="fa fa-phone text-theme-colored mr-1"></i>
                                    +370 686 10246
                                </a>
                            </li>
                            <li class="m-0 pl-10 pr-10">
                                <a href="mailto:aurimas@amcoachlab.com" class="text-white">
                                    <i class="fa-sharp fa-solid fa-envelope text-theme-colored mr-1"></i>
                                    aurimas@amcoachlab.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 pr-0">
                    <div class="widget no-border m-0">
                        <ul class="styled-icons icon-flat icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                            <!--<li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
            <div class="container">
                <nav class="menuzord">
                    <a class="menuzord-brand pull-left flip mt-20" href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    </a>
                    <ul class="menuzord-menu">
                        @if (Str::contains(url()->current(), 'admin'))
                            <li class="@if (Str::contains(url()->current(), 'reservations')) active @endif">
                                <a href="{{ route('admin.reservations') }}">{{ __('Reservations') }}</a>
                            </li>
                            <li class="@if (Str::contains(url()->current(), 'vyrtrens')) active @endif">
                                <a href="{{ route('vyrtrens.index') }}">{{ __('Head coaches') }}</a>
                            </li>
                            <li class="@if (Str::contains(url()->current(), 'vyrtrenasss')) active @endif">
                                <a href="{{ route('vyrtrenasss.index') }}">{{ __('Head coach assistants') }}</a>
                            </li>
                            <li class="@if (Str::contains(url()->current(), 'fiztrens')) active @endif">
                                <a href="{{ route('fiztrens.index') }}">{{ __('Physical training coaches') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none m-0">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="@if (url()->current() == route('livewire.reservation')) active @endif">
                                <a href="{{ route('livewire.reservation') }}">{{ __('Coach reservation') }}</a>
                            </li>
                            @if (auth()->check())
                                <li>
                                    <a href="{{ route('admin.reservations') }}">{{ __('Admin panel') }}</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
