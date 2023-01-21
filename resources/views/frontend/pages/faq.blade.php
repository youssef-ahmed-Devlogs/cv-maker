@extends('frontend.layout.app')

@section('content')
    <section class="frequent-section">
        <div class="container">
            <h1 class="page-title text-center">Frequent questions</h1>

            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="text">Can I use the site without logging in ?</span>
                                    <span class="icon">
                                        <i class="fas fa-angle-up"></i>
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    You cannot use the site and make CVs unless you log in to
                                    the site through the
                                    <a href="/" class="btn-link d-inline-block">Login Page</a>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
