<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NotificationRepository;
use Auth;

class NotificationController extends Controller
{
    protected $notification;
    
    public function __construct(NotificationRepository $notification)
    {
         $this->middleware('auth');
         $this->notification = $notification;
    }


    public function newNotifications()
    {
        $notifications = $this->notification->ReminderforUser(Auth::user());

        foreach($notifications as $key => $notification) $notifications[$key]['translated'] = __($notification['content']);

        return response()->json([
            'notification' => $notifications
        ]);
    }

    public function inbox()
    {
        $notifications = $this->notification->AllMessageforUser(Auth::user());

        return view('notification', [
            'notifications' => $notifications
        ]);
    }
}
