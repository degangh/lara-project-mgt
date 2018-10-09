<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\OnTaskComplete;
use App\Notification;

class NotificationOnTaskComplete
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::create([
            'sender_id' => $event->task->assignee,
            'reader_id' => $event->task->user_id,
            'content' => 'Task ' . $event->task->name . ' is marked as completed'
        ]);
    }
}
