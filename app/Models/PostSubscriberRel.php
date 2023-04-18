<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSubscriberRel extends Model
{
    use HasFactory;

    public function subscribers(){
        return $this->belongsTo(Subscriber::class,'subscriber_id','id');
    }

    public function posts(){
        return $this->belongsTo(Post::class,'post_id','id');
    }

}
