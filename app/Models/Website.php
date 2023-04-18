<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;



    public function subscribers()
    {
        return $this->hasMany(WebsiteSubscriber::class,'website_id');
    }

    public function posts(){
        return $this->hasMany(Post::class,'website_id');
    }

    
}
