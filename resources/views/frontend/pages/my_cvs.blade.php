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
            <h1 class="page-title text-center">{{ __('frontend.my_cvs_head') }}</h1>

            <input type="text" id="share_url_input" class="d-none">

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
                                        <span class="created_at">{{ __('frontend.created_at') }}:
                                            {{ date_format($cv->created_at, 'Y-m-d') }}</span>
                                        <span class="last_edit">{{ __('frontend.last_edit') }}:
                                            {{ date_format($cv->updated_at, 'Y-m-d') }}</span>
                                    </div>
                                </div>

                                <div class="cv-actions d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    @if (auth()->user()->pro_subscription() != null)
                                        <button class="cv-action-btn btn btn-secondary share_btn"
                                            data-url="{{ route('frontend.cvs.share', $cv) }}">
                                            <i class="fa-solid fa-share"></i>
                                            {{ __('frontend.share_button_text') }}
                                        </button>

                                        <a href="{{ route('frontend.cvs.edit', $cv) }}"
                                            class="cv-action-btn btn btn-success">
                                            <i class="fas fa-pen"></i>
                                            {{ __('frontend.edit_button_text') }}
                                        </a>

                                        <a href="{{ route('frontend.cvs.download', $cv) }}"
                                            class="cv-action-btn btn btn-primary">
                                            <i class="fa-solid fa-arrow-down"></i>
                                            {{ __('frontend.download_button_text') }}
                                        </a>
                                    @else
                                        <a href="{{ route('frontend.subscription') }}"
                                            class="cv-action-btn btn btn-secondary disabled"
                                            title="You have to sucscribe in the pro subscription to use this feature">
                                            <i class="fa-solid fa-share"></i>
                                            {{ __('frontend.share_button_text') }}
                                        </a>

                                        <a href="{{ route('frontend.subscription') }}"
                                            class="cv-action-btn btn btn-success disabled"
                                            title="You have to sucscribe in the pro subscription to use this feature">
                                            <i class="fas fa-pen"></i>
                                            {{ __('frontend.edit_button_text') }}
                                        </a>


                                        <a href="{{ route('frontend.subscription') }}"
                                            class="cv-action-btn btn btn-primary disabled"
                                            title="You have to sucscribe in the pro subscription to use this feature">
                                            <i class="fa-solid fa-arrow-down"></i>
                                            {{ __('frontend.download_button_text') }}
                                        </a>
                                    @endif

                                    <button class="cv-action-btn btn btn-danger"
                                        onclick='deleteMyCv(document.getElementById("{{ $cv->id }}_cv_delete_form"))'>
                                        <i class="fa-solid fa-trash-can"></i>
                                        {{ __('frontend.delete_button_text') }}
                                    </button>


                                </div>

                                <form id="{{ $cv->id }}_cv_delete_form"
                                    action="{{ route('frontend.cvs.destroy', $cv) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection



@section('scripts')
    <script>
        const shareButtons = document.querySelectorAll('.share_btn');
        const shareUrlInput = document.getElementById("share_url_input");

        shareButtons.forEach(btn => {
            btn.addEventListener('click', function(event) {
                const url = btn.dataset.url;
                shareUrlInput.value = url;

                shareUrlInput.select();
                shareUrlInput.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(shareUrlInput.value);
            })
        });
    </script>

    <script>
        function deleteMyCv(form) {
            if (confirm('Are you sure?'))
                form.submit();
        }
    </script>
@endsection
