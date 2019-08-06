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
         $this->notification = $notification;
         $this->task = $task;
    }

     /**
     * Display the specified resource.
     *
     * @param  null
     * @return \Illuminate\Http\Response
     */
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

     /**
     * Display current user's notification message.
     *
     * @param  null
     * @return \Illuminate\View\View
     */

    public function inbox()
    {
        $notifications = $this->notification->AllMessageforUser(Auth::user())->paginate(15);

        foreach($notifications as $key => $notification) 
        
        $notifications[$key]['translated'] = __($notification['content'], [
            'taskName' => $this->{$notification['notifiable_type']}->find($notification['notifiable_id'])->name
            ]);

        return view('notification', [
            'notifications' => $notifications
        ]);
    }

    /**
     * toggle viewed status of notification
     * @param notification $notification
     * @return \Illuminate\Http\Response
     *
    */

    public function markAsViewed(notification $notification)
    {
        try
        {
            $this->authorize('edit', $notification);
        }

        catch(\Exception $e)
        {
            abort('403', 'Edit notification is now allowed');
        }
        
        $notification->is_viewed = $notification->is_viewed ? 0: 1;
        $notification->save();
        
        return response()->json([
            'notification' => $notification
        ]);
    }
}
