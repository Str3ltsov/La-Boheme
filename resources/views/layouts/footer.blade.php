<footer class="text-center text-lg-start bg-black text-light mt-auto px-1">
    <section>
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3 pt-5" style="gap: 5em">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <a class="navbar-brand m-0" href="{{ url('/') }}">
                        <img src="/images/logo.png" alt="Logo" width="220">
                    </a>
                    <div class="mt-5" style="color: #C19F5F">
                        <a href="#" class="me-4 text-reset">
                            <i class="fa-solid fa-phone-flip"></i>
                        </a>
                        <a href="#" class="me-4 text-reset">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </a>
                        <a href="#" class="me-4 text-reset">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="me-4 text-reset">
                            <i class="fa-brands fa-facebook-square"></i>
                        </a>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-start w-auto mx-auto px-2" style="gap: 10px">
                    <div class="d-flex align-items-center mx-3" style="color: #C19F5F; gap: 10px;">
                        <i class="fa-solid fa-phone-flip fs-5"></i>
                        <div class="d-flex flex-column align-items-start">
                            <span style="letter-spacing: 5px; text-transform: uppercase; font-size: 0.7em">
                                {{ __('Rezervuoti staliuką') }}
                            </span>
                            <a class="text-decoration-none" href="#">
                                <span class="text-light">+370 686 10246</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mx-3" style="color: #C19F5F; gap: 10px;">
                        <i class="fa-solid fa-wine-glass fs-5"></i>
                        <div class="d-flex flex-column align-items-start">
                            <span style="letter-spacing: 5px; text-transform: uppercase; font-size: 0.7em">
                                {{ __('Renginių organizavimas') }}
                            </span>
                            <a class="text-decoration-none" href="#">
                                <span class="text-light">joana@getweb.lt // +370 686 10246</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mx-3" style="color: #C19F5F; gap: 10px;">
                        <i class="fa-solid fa-question fs-5"></i>
                        <div class="d-flex flex-column align-items-start">
                            <span style="letter-spacing: 5px; text-transform: uppercase; font-size: 0.7em">
                                {{ __('Klausimai ir pasiūlymai') }}
                            </span>
                            <a class="text-decoration-none" href="#">
                                <span class="text-light">joana@getweb.lt</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mx-3" style="color: #C19F5F; gap: 10px;">
                        <i class="fa-solid fa-wine-bottle fs-5"></i>
                        <div class="d-flex flex-column align-items-start text-start">
                                <span style="letter-spacing: 5px; text-transform: uppercase; font-size: 0.7em">
                                    {{ __('Didmeninė ir mažmeninė prekyba gėrimais') }}
                                </span>
                            <a class="text-decoration-none" href="#">
                                <span class="text-light">joana@getweb.lt // +370 686 10246</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-start w-auto mx-auto" style="gap: 10px">
                    <div class="d-flex" style="gap: 10px">
                        <i class="fa-regular fa-clock fs-5" style="color: #C19F5F"></i>
                        <div class="d-flex flex-column align-items-start">
                                <span style="letter-spacing: 5px; text-transform: uppercase; color: #C19F5F; font-size: 0.7em">
                                    {{ __('Darbo laikas') }}
                                </span>
                            <a class="d-flex flex-column text-light align-items-start text-decoration-none" href="#">
                                <span>{{ __('Pirmadienis').' 17–22' }}</span>
                                <span>{{ __('Antradienis').' 17-00' }}</span>
                                <span>{{ __('Trečiadienis').' 17-00' }}</span>
                                <span>{{ __('Ketvirtadienis').' 17-00' }}</span>
                                <span>{{ __('Penktadienis').' 17-00' }}</span>
                                <span>{{ __('Šeštadienis').' 17-00' }}</span>
                                <span>{{ __('Sekmadienis').' 17-00' }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-4 mt-5" style="background-color: rgba(0, 0, 0, 0.05)">
        <span class="mx-3">{{ __('Visos teisės saugomos 2022 La Boheme.') }}</span>
        <a class="text-reset text-decoration-none" href="#">
            <span style="color: #C19F5F">{{ __('Privatumo politika') }}</span>
        </a>
    </div>
</footer>
