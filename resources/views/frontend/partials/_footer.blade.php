<footer>
    <div class="container-fluid">
        <div class="top-footer">
            <div class="row align-items-center">
                <div class="col-xl-4 mb-3">
                    <a href="{{ route('frontend.index') }}" class="logo">
                        <img src="{{ asset('frontend/images/logo/logo-light.png') }}" alt="" />
                    </a>
                </div>
                <div class="col-xl-8">
                    <ul class="links d-flex align-items-center flex-wrap gap-4">
                        <a href="{{ route('frontend.my_account') }}">
                            {{ __('frontend.my_account') }}
                        </a>
                        <a href="{{ route('frontend.templates') }}">
                            {{ __('frontend.templates') }}
                        </a>
                        <a href="{{ route('frontend.about') }}">
                            {{ __('frontend.about') }}
                        </a>
                        <a href="{{ route('frontend.faq') }}">
                            {{ __('frontend.faq') }}
                        </a>
                        <a href="{{ route('frontend.contact') }}">
                            {{ __('frontend.contact_us') }}
                        </a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bottom-footer">
            <p class="footer-text text-center m-0">&copy; CV MAKER 2022</p>
        </div>
    </div>
</footer>
