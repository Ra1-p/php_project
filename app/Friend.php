<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/** @property int $friend_id
 *  @property int $user_id
 *  @property  bool $accepted
 */

class Friend extends Model
{
    protected $table = 'friends';
    protected $allowedFilters = [
        'friend_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
