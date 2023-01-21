@extends('frontend.layout.app')

@section('content')
    <section class="frequent-section">
        <div class="container">
            <h1 class="page-title text-center">Contact Us</h1>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-item mb-2">
                            <input type="email" class="form-control" placeholder="Email" />
                        </div>

                        <div class="form-item mb-2">
                            <input type="text" class="form-control" placeholder="Subject" />
                        </div>

                        <div class="form-item">
                            <textarea cols="30" rows="10" name="content" class="form-control" placeholder="Content"></textarea>
                        </div>

                        <button class="btn btn-primary mt-3 d-flex align-items-center gap-2">
                            <i class="fas fa-paper-plane"></i>
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
