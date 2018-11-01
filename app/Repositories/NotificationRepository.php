<?php
namespace App\Repositories;

use App\User;
use App\Project;
use App\Notification;
use Auth;

class NotificationRepository
{
    /**
     * retrieve collection of new notification of a user.
     *
     * @param  \App\User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    
    public function ReminderforUser(User $user)
    {
        return Notification::with('sender')->where('reader_id', $user->id)
                        ->where('is_viewed', 0)
                        ->orderBy('created_at', 'desc')
                        ->get();
    }

    /**
     * retrieve collection of all notification of a user.
     *
     * @param  \App\User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function AllMessageforUser(User $user)
    {
        return Notification::with('sender')->where('reader_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
    }
    
    /**
     * retrieve collection of new notification of a user.
     *
     * @param  \App\Notification $notfication
     * 
     */
    public function MarkAsViewed(Notification $notification)
    {
        $notification->is_viewed = 1;
        $notification->save();
    }

    /**
     * retrieve collection of new notification of a user.
     *
     * @param  Request $request
     * @return \App\Notification
     */
    public function createOnComplete($data)
    {
        Notification::create([
            'sender_id' => $data->task->assignee,
            'reader_id' => $data->task->user_id,
            'content' => 'notification.taskComplete' ,
            'notifiable_type' => 'task',
            'notifiable_id' => $data->task->id
        ]);
    }

    /**
     * retrieve collection of new notification of a user.
     *
     * @param  Request $request
     * @return \App\Notification
     */
    public function createOnAssigned($data)
    {
        Notification::create([
            'sender_id' => $data->task->user_id,
            'reader_id' => $data->task->assignee,
            'content' => 'notification.taskAssigned' ,
            'notifiable_type' => 'task',
            'notifiable_id' => $data->task->id
        ]);
    }
}