<header>
    <nav class="navbar fixed-top p-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('frontend.index') }}">
                <img src="{{ asset('frontend/images/logo/logo-dark.png') }}" alt="" />
            </a>

            <div class="desktop-links d-flex align-items-center">
                <form action="{{ route('localization.change_language') }}" method="POST">
                    @csrf

                    @if (session()->get('locale') == 'en')
                        <button class="language-toggle mx-2">
                            <img src="{{ asset('frontend/images/logo/ar.jpg') }}" alt="site language" />
                        </button>
                        <input type="hidden" name="language" value="ar">
                    @elseif (session()->get('locale') == 'ar')
                        <button class="language-toggle mx-2">
                            <img src="{{ asset('frontend/images/logo/en.jpg') }}" alt="site language" />
                        </button>

                        <input type="hidden" name="language" value="en">
                    @else
                        <button class="language-toggle mx-2">
                            <img src="{{ asset('frontend/images/logo/ar.jpg') }}" alt="site language" />
                        </button>
                        <input type="hidden" name="language" value="ar">
                    @endif


                </form>

                <div class="dark-mode-toggle mx-2">
                    <i class="fas fa-moon icon"></i>
                </div>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center flex-direction-row flex-row">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.my_cvs') }}">
                                <i class="far fa-copy"></i>
                                {{ __('frontend.my_cvs') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="icon" src="{{ auth()->user()->photo() }}" alt="" />
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('frontend.my_account') }}">
                                        <i class="fas fa-user"></i>
                                        {{ __('frontend.my_account') }}
                                    </a>
                                </li>

                                <li>
                                    <form action="{{ route('frontend.logout') }}" method="POST">
                                        @csrf

                                        <button class="dropdown-item">
                                            <i class="fas fa-door-closed"></i>
                                            {{ __('frontend.logout') }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.index') }}">
                                <i class="far fa-user"></i>
                                {{ __('frontend.login') }}
                            </a>
                        </li>
                    @endauth
                </ul>


                <button class="navbar-toggler d-none ms-1" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <div class="mobile-links offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        {{ __('frontend.menu') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.my_account') }}">
                                    <img class="icon" src="{{ auth()->user()->photo() }}" alt="" />
                                    {{ auth()->user()->name }}

                                    {{ auth()->user()->isAdmin()? 'yes': 'no' }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.my_cvs') }}">
                                    <i class="far fa-copy"></i>
                                    {{ __('frontend.my_cvs') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <form action="{{ route('frontend.logout') }}" method="POST">
                                    @csrf

                                    <button class="nav-link">
                                        <i class="fas fa-door-closed"></i>
                                        {{ __('frontend.logout') }}
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.index') }}">
                                    <i class="far fa-user"></i>
                                    {{ __('frontend.login') }}
                                </a>
                            </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
