<?php

namespace App\Http\Controllers;

use App\Models\Notification;


class NotificationController extends Controller
{
    public function index()
    {
        $direction = 'notifications';
        $notifications = Notification::where('notifiable_id', '=', auth()->id())->orderByDesc('created_at')->get();
        $unreadNoti = auth()->user()->unreadNotifications()->count();
        return view('layout.app', compact('direction', 'notifications', 'unreadNoti'));
    }

    public function markAsRead(string $id)
    {
        $notification = Notification::where('id', $id)->firstOrFail();
        $notification->markAsRead();
        return back();
    }
}
