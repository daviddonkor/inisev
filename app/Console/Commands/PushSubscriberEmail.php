<?php

namespace App\Console\Commands;

use App\Jobs\SendSubscriberEmail;
use Illuminate\Console\Command;

class PushSubscriberEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email of post to All subscribers of a website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dispatch(new SendSubscriberEmail);
        
    }
}
