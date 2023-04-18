<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function websites(){
        return $this->belongsTo(Website::class,'website_id');
    }

    public function subcribers(){
        return $this->hasMany(PostSubscriberRel::class,'id','post_id');
    }
}
