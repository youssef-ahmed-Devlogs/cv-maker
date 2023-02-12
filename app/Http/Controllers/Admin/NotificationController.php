<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.pages.notifications');
    }

    public function read($notification_id)
    {
        $notification = auth()->user()->unreadNotifications->where('id', $notification_id)->first();
        $notification->markAsRead();

        return redirect($notification->data['url']);
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    }
}
