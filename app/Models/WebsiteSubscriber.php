<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSubscriber extends Model
{
    use HasFactory;

    public function websubscribers(){
        return $this->belongsTo(Subscriber::class,'subscriber_id','id');
    }

    public function websites(){
        return $this->belongsTo(Website::class,'website_id','id');
    }
}
