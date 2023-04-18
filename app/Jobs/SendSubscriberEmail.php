<?php

namespace App\Jobs;

use App\Mail\SubscriberEmail;
use App\Models\PostSubscriberRel;
use App\Models\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use illuminate\Support\Facades\Mail;

class SendSubscriberEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $db = Website::with('posts','subscribers')->whereRelation('posts','status','=',1)->whereHas('subscribers')->get();
        
        foreach($db as $websiteWithNewPost){

            $postsub = PostSubscriberRel::where('post_id',$websiteWithNewPost->posts->id)->where('emailed',1)->first();
            if(!$postsub){
                try {
                    $postman=[];
                    $postman['from'] =$websiteWithNewPost->url;
                    $postman['post'] =$websiteWithNewPost->posts;
                    $email = new SubscriberEmail($postman);
                    Mail::to($websiteWithNewPost->subscribers->email)->send($email);
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        }

      
       
    }
}
