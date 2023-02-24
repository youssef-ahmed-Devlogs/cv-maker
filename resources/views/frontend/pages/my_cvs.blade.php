@extends('frontend.layout.app')

@section('styles')
    <style>
        .cv-template-card .cv-cover {
            border: 2px solid var(--blue-dark-color);
            overflow: hidden;
            border-radius: 6px;
            translate: 0 -40px;
            margin: auto;
        }

        .cv-template-card .cv-cover,
        .cv-template-card .cv-cover img {
            width: 200px;
            height: 270px;
        }

        .cv-template-card .cv-info .template-name {
            color: var(--dark-color);
            font-weight: bold;
            font-size: var(--h3-size);
            margin-bottom: 3px;
        }

        .cv-template-card .cv-info .dates {
            color: var(--gray-color);
            font-weight: bold;
            font-size: var(--h8-size);
            margin-bottom: 15px;
        }

        .cv-template-card .cv-action-btn {
            width: calc(50% - 5px);
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
@endsection

@section('content')
    <section class="frequent-section">
        <div class="container">
            <h1 class="page-title text-center">{{ __('frontend.my_cvs') }}</h1>

            <div class="row mt-5">

                @foreach ($cvs as $cv)
                    <div class="col-xl-4 mb-5">
                        <div class="card cv-template-card">
                            <div class="card-body">
                                <div class="cv-cover">
                                    <img src="{{ $cv->template->cover() }}" alt="">
                                </div>

                                <div class="cv-info">
                                    <h4 class="template-name">{{ $cv->name ?? 'Template' }}</h4>
                                    <div class="dates d-flex align-items-center justify-content-between">
                                        <span class="created_at">Created at: {{ $cv->created_at }}</span>
                                        <span class="last_edit">Last edit: {{ $cv->updated_at }}</span>
                                    </div>
                                </div>

                                <div class="cv-actions d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <a href="{{ route('frontend.download') }}" class="cv-action-btn btn btn-primary">
                                        <i class="fa-solid fa-arrow-down"></i>
                                        Download
                                    </a>

                                    <a href="#" class="cv-action-btn btn btn-secondary">
                                        <i class="fa-solid fa-share"></i>
                                        Share
                                    </a>

                                    <a href="{{ route('frontend.cvs.edit', $cv) }}" class="cv-action-btn btn btn-success">
                                        <i class="fas fa-pen"></i>
                                        Edit
                                    </a>

                                    <button class="cv-action-btn btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
