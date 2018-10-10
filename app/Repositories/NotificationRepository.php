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
        return Notification::where('reader_id', $user->id)
                        ->where('is_viewd', 0)
                        ->orderBy('created_at', 'asc')
                        ->get();
    }
    
    public function MessageListForUser(User $user)
    {

    }

    public function MarkAsViewed(Notification $notification)
    {

    }

    public function create($data)
    {
        Notification::create([
            'sender_id' => $data->task->assignee,
            'reader_id' => $data->task->user_id,
            'content' => 'Task ' . $data->task->name . ' is marked as completed' 
        ]);
    }
}