<footer>
    <div class="container-fluid">
        <div class="top-footer">
            <div class="row align-items-center">
                <div class="col-xl-4 mb-3">
                    <a href="{{ route('frontend.index') }}" class="logo">
                        <img src="{{ asset('images/logo/logo-light.png') }}" alt="" />
                    </a>
                </div>
                <div class="col-xl-8">
                    <ul class="links d-flex align-items-center flex-wrap gap-4">
                        <a href="{{ route('frontend.my_account') }}">My Account</a>
                        <a href="{{ route('frontend.templates') }}">Templates</a>
                        <a href="{{ route('frontend.about') }}">About</a>
                        <a href="{{ route('frontend.faq') }}">FAQ</a>
                        <a href="{{ route('frontend.contact') }}">Contact Us</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bottom-footer">
            <p class="footer-text text-center m-0">&copy; CV MAKER 2022</p>
        </div>
    </div>
</footer>
