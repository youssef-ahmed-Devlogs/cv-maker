        <style>
            .notifications-list-item.active,
            .notifications-dropdown-item.dropdown-item.active,
            .notifications-dropdown-item .dropdown-item:active {
                background: #6673fd3f;
            }
        </style>

        <!--**********************************
          Header start
      ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <h4 class="m-0">
                                <small>Welcome back</small>
                                <strong> {{ auth()->user()->name }}</strong>
                            </h4>
                        </div>

                        <ul class="navbar-nav header-right">

                            {{-- <li class="nav-item">
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
                            </li> --}}

                            @php
                                $notifications = auth()
                                    ->user()
                                    ->unreadNotifications()
                                    ->limit(3)
                                    ->get();
                                $unreadNotifications = auth()
                                    ->user()
                                    ->unreadNotifications->count();
                            @endphp

                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    @if ($unreadNotifications)
                                        <div class="pulse-css"></div>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <p class="d-flex align-items-center justify-content-between pt-3 px-3">
                                        <span class="badge badge-primary badge-circle">
                                            {{ $unreadNotifications }}
                                        </span>

                                        <a href="{{ route('admin.notifications.markAllAsRead') }}">
                                            <strong>Mark all as read</strong>
                                        </a>
                                    </p>

                                    <ul class="list-unstyled">

                                        @forelse ($notifications as $notification)
                                            <li
                                                class="media dropdown-item notifications-dropdown-item {{ !$notification->read_at ? 'active' : '' }}">
                                                <span class="{{ $notification->data['status'] }}">
                                                    <i class="ti-{{ $notification->data['type'] }}"></i>
                                                </span>

                                                <div class="media-body">
                                                    <a
                                                        href="{{ route('admin.notifications.read', $notification->id) }}">
                                                        <p>
                                                            {{ $notification->data['content'] }}
                                                        </p>
                                                    </a>
                                                </div>

                                                <span class="notify-time">{{ $notification->created_at }}</span>
                                            </li>
                                        @empty
                                            <li class="media dropdown-item">
                                                There's no unread notifications.
                                            </li>
                                        @endforelse


                                        {{-- <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>

                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as
                                                        unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>

                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>

                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li> --}}

                                    </ul>
                                    <a class="all-notification" href="{{ route('admin.notifications.index') }}">See all
                                        notifications <i class="ti-arrow-right"></i></a>
                                </div>
                            </li>

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{ auth()->user()->photo() }}" width="20" alt="" />
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">

                                    <a href="{{ route('admin.profile') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">{{ strtoupper(auth()->user()->name) }}</span>
                                    </a>


                                    <a href="{{ route('frontend.index') }}" class="dropdown-item ai-icon">
                                        <i class="fa-solid fa-globe"></i>
                                        <span class="ml-2">Site</span>
                                    </a>

                                    <a href="./email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>

                                    <form action="{{ route('admin.logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12">
                                                </line>
                                            </svg>
                                            <span class="ml-2">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </li>


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
      Header end ti-comment-alt
  ***********************************-->
