@php
    $notifications = auth()->user()->notifications;
    $unreadNotifications = auth()
        ->user()
        ->unreadNotifications->count();
@endphp


<div class="card">
    <div class="card-header">
        <h4 class="card-title">Notifications</h4>

        <div class="d-flex align-items-center">
            <a href="{{ route('admin.notifications.markAllAsRead') }}">
                <strong>Mark all as read</strong>
            </a>

            <span class="badge badge-primary badge-circle ml-2">
                {{ $unreadNotifications }}
            </span>
        </div>
    </div>
    <div class="card-body">
        <div class="widget-todo dz-scroll" style="height:370px;" id="DZ_W_Notifications">
            <ul class="timeline">
                @forelse ($notifications as $notification)
                    <li class="notifications-list-item p-2 mb-1 rounded {{ !$notification->read_at ? 'active' : '' }}">
                        <div class="timeline-badge primary"></div>

                        <a class="timeline-panel text-muted mb-0 d-flex align-items-center"
                            href="{{ route('admin.notifications.read', $notification->id) }}">

                            <img class="rounded-circle" alt="image" style="width:50px;height:50px;object-fit: cover"
                                src="{{ $notification->data['image'] }}">

                            <div class="col">
                                <h5 class="mb-1">
                                    {{ $notification->data['content'] }}
                                </h5>
                                <small class="d-block">{{ $notification->created_at }}</small>
                            </div>
                        </a>
                    </li>
                @empty
                    <li>
                        There's no notifications.
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
