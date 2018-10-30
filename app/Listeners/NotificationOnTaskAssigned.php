<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notification;
use App\Repositories\NotificationRepository;

class NotificationOnTaskAssigned
{
    protected $notification;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NotificationRepository $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->notification->createOnAssigned($event);
    }
}
