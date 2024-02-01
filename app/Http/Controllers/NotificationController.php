<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function getNotificationsCount($userId)
    {
        $count = Notification::where('id_user', $userId)->where('is_read', 0)->count();
        return response()->json(['count' => $count]);
    }

    public function getNotifications($userId)
    {
        $notifications = Notification::where('id_user', $userId)->orderBy('created_at', 'desc')->get();
        return response()->json(['notifications' => $notifications]);
    }

    public function resetNotificationsCount($userId)
    {
        Notification::where('id_user', $userId)->update(['is_read' => 1]);
        return response()->json(['success' => true]);
    }
}