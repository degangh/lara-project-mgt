<?php
namespace App\Repositories;

use App\User;
use App\Project;
use App\Notification;
use Auth;

class NotificationRepository
{
    public function ReminderforUser(User $user)
    {
        return Notification::with('sender')->where('reader_id', $user->id)
                        ->where('is_viewed', 0)
                        ->orderBy('created_at', 'asc')
                        ->get();
    }

    public function AllMessageforUser(User $user)
    {
        return Notification::with('sender')->where('reader_id', $user->id)
                        ->orderBy('created_at', 'asc')
                        ->get();
    }
    

    public function MarkAsViewed(Notification $notification)
    {
        $notification->is_viewed = 1;
        $notification->save();
    }

    public function create($data)
    {
        Notification::create([
            'sender_id' => $data->task->assignee,
            'reader_id' => $data->task->user_id,
            'content' => 'notification.taskComplete' 
        ]);
    }
}