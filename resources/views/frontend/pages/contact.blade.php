@extends('frontend.layout.app')

@section('content')
    <section class="frequent-section">
        <div class="container">
            <h1 class="page-title text-center">{{ __('frontend.contact_us') }}</h1>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-item mb-2">
                            <input type="email" class="form-control" placeholder="{{ __('frontend.enter_email') }}" />
                        </div>

                        <div class="form-item mb-2">
                            <input type="text" class="form-control" placeholder="{{ __('frontend.enter_subject') }}" />
                        </div>

                        <div class="form-item">
                            <textarea cols="30" rows="10" name="content" class="form-control"
                                placeholder="{{ __('frontend.enter_content') }}"></textarea>
                        </div>

                        <button class="btn btn-primary mt-3 d-flex align-items-center gap-2">
                            <i class="fas fa-paper-plane"></i>
                            {{ __('frontend.send') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
