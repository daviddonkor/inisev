<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendSubscriberEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostCreatedEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
       dispatch(new SendSubscriberEmail);


    }
}
