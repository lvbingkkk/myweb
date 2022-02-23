<?php

namespace App\Listeners;

use App\Events\ThreadHasNewReply;
use App\Events\ThreadReceivedNewReply;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyThreadSubscribers
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
     * @param  ThreadHasNewReply  $event
     * @return void
     */
   /* public function handle(ThreadHasNewReply $event)
    {
        //
        $event->thread->subscriptions
            ->where('user_id','!=',$event->reply->user_id)
            ->each
            ->notify($event->reply);


    }*/

    public function handle(ThreadReceivedNewReply $event)
    {
        //
        $thread = $event->reply->thread;

        $thread->subscriptions
            ->where('user_id','!=',$event->reply->user_id)
            ->each
            ->notify($event->reply);


    }
}
