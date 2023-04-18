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
        $db = Website::has('subscribers')->has('posts')->with('posts','subscribers.websubscribers')->whereRelation('posts','status','=',1)->get();
      
        foreach($db as $websiteWithNewPost){

           $posts =$websiteWithNewPost->posts;
           $subscribers =$websiteWithNewPost->subscribers ;
         
           
            foreach ($posts as $post)
            { 

                foreach($subscribers as $subscriber){
                  
                    
                    $postsub = PostSubscriberRel::where('post_id',$post->id)->where('subscriber_id',$subscriber->websubscribers->id)->where('emailed',1)->first();
                    if(!$postsub){
                        try {
                            
                           
                            $email = new SubscriberEmail($post);
                            \Mail::to($subscriber->websubscribers->email)->send($email);
                        } catch (\Throwable $th) {
                            throw $th;
                        }
                    
                }
                }

            }
           
          
        }

      
       
    }
}
