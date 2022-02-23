<?php

namespace App\Listeners;

use App\Events\ThreadReceivedNewReply;
use App\Notifications\YouWereMentioned;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyMentionedUsers
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
     * @param  ThreadReceivedNewReply  $event
     * @return void
     */
    public function handle(ThreadReceivedNewReply $event)
    {
        /*preg_match_all('/\@([^\s\.]+)/',$event->reply->body,$matches);

        foreach ($matches[1] as $name) {
            $user = User::whereName($name)->first();

            if ($user) {
                $user->notify(new YouWereMentioned($event->reply));
            }
        }*/


        //超级不懂，，map()  加filter()什么意思？
        // 啥意思这  each()  use?;;
        collect($event->reply->mentionedUsers())
            ->map(function ($name) {
                return User::where('name',$name)->first();
            })
            ->filter()
            ->each(function ($user) use ($event){
                $user->notify(new YouWereMentioned($event->reply));
            });

    }
}
