<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 *
 * @property string $password
 * @property string $remember_token
 * @property Profile $profile
 */
class User extends Model implements Authenticatable
{
    use SoftDeletes;
    use Notifiable;

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
        'remember_token',
        'updated_at',
        'created_at',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function friend()
    {
        return $this->hasMany(Friend::class);
    }

    public function getAuthIdentifierName()
    {
        return 'id'; // Имя поля, которое используется в качестве идентификатора аутентификации
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Возвращает значение идентификатора аутентификации
    }

    public function getAuthPassword()
    {
        return $this->password; // Возвращает пароль пользователя
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function setRememberToken($value)
    {
        $this->attributes['remember_token'] = $value;
        $this->save();
    }

//
//    public function posts()
//    {
//        return $this->hasMany(Post::class);
//    }
}
