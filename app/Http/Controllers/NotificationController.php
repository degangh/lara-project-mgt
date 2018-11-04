<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NotificationRepository;
use App\Repositories\TaskRepository;
use Auth;
use App\Notification;


class NotificationController extends Controller
{
    protected $notification;
    protected $task;
    
    public function __construct(NotificationRepository $notification, TaskRepository $task)
    {
         $this->middleware('auth');
         $this->notification = $notification;
         $this->task = $task;
    }


    public function newNotifications()
    {
        $notifications = $this->notification->ReminderforUser(Auth::user());


        foreach($notifications as $key => $notification) 
        
        $notifications[$key]['translated'] = __($notification['content'], [
            'taskName' => $this->{$notification['notifiable_type']}->find($notification['notifiable_id'])->name
            ]);

        return response()->json([
            'notification' => $notifications
        ]);
    }

    public function inbox()
    {
        $notifications = $this->notification->AllMessageforUser(Auth::user())->paginate(5);

        foreach($notifications as $key => $notification) 
        
        $notifications[$key]['translated'] = __($notification['content'], [
            'taskName' => $this->{$notification['notifiable_type']}->find($notification['notifiable_id'])->name
            ]);

        return view('notification', [
            'notifications' => $notifications
        ]);
    }

    public function markAsViewed(notification $notification)
    {
        return response()->json([
            'notification' => $notification
        ]);
    }
}
