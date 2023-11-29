<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $fname
 * @property string $password
 *
 * @property Profile $profile
 */
class User extends Model implements Authenticatable
{
    use SoftDeletes, \Illuminate\Auth\Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'phone_number',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'phone_number',
        'email',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'phone_number',
        'email',
        'updated_at',
        'created_at',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

//
//    public function posts()
//    {
//        return $this->hasMany(Post::class);
//    }
}
