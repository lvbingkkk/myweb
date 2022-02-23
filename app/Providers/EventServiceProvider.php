<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        //话题有新回复通知订阅者
        /*'App\Events\ThreadHasNewReply'=>[
            'App\Listeners\NotifyThreadSubscribers',
        ],*/

        //话题的回复中@某人，通知被@的人
        'App\Events\ThreadReceivedNewReply'=>[
            'App\Listeners\NotifyMentionedUsers',
            'App\Listeners\NotifyThreadSubscribers',

        ],

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
