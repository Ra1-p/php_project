<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Category extends Model
{
    public function users(){
        return $this->hasMany(Post::class, "user_id", "id");

    }
}
