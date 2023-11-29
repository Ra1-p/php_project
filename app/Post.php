<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [];
    protected $table = 'posts';

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
