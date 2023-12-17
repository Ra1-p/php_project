<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property User $user
 */
class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'image',
        'location',
        'birthday'
        ];

    protected $allowedFilters = [
        'user_id',
        'first_name',
        'last_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
