@extends('frontend.layout.app')

@section('content')
    <section class="frequent-section">
        <div class="container">
            <h1 class="page-title text-center">{{ __('frontend.about') }}</h1>
            <div class="card">
                <div class="card-body">

                    @foreach (__('frontend.advantages_heading') as $heading)
                        <div class="doyoudo">
                            <h3 class="question">{{ $heading }}</h3>
                            <p class="answer">
                                {{ __('frontend.advantages_text')[$loop->index] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
