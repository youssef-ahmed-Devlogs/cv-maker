@extends('frontend.layout.app')

@section('content')
    <section class="frequent-section">
        <div class="container">
            <h1 class="page-title text-center">
                {{ __('frontend.faq') }}
            </h1>

            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordionExample">

                        @foreach (__('frontend.faq_questions') as $key => $value)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                                    <button class="accordion-button {{ $loop->index > 0 ? 'collapsed' : '' }}"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="true"
                                        aria-controls="collapse-{{ $loop->index }}">
                                        <span class="text">{{ $key }}</span>
                                        <span class="icon">
                                            <i class="fas fa-angle-up"></i>
                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse-{{ $loop->index }}"
                                    class="accordion-collapse collapse {{ $loop->index == 0 ? 'show' : '' }}"
                                    aria-labelledby="heading-{{ $loop->index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $value }}
                                    </div>
                                </div>
                            </div>
                        @endforeach



                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="text">In which formats can I download my CV ?</span>
                                    <span class="icon">
                                        <i class="fas fa-angle-up"></i>
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    If you are on the FREE SUBSCRIPTION, you can download your
                                    resume in JPG format.<br />
                                    But if you are within the
                                    <a href="/subscription" class="btn-link d-inline-block">PRO SUBSCRIPTION</a>, you can
                                    also download it as a PDF file
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="text">Are these CVs good for applying for jobs ?</span>
                                    <span class="icon">
                                        <i class="fas fa-angle-up"></i>
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    All templates have been reviewed and tested by expert
                                    recruiters. It'll let you show yourself in the best
                                    possible.
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
