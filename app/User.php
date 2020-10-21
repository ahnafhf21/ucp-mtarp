<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'accounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'facebook', 'instagram', 'twitter', 'salt', 'token', 'registerdate'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'registerdate',
        'lastlogin'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function characters()
    {
      return $this->hasMany(Character::class, 'account');
    }
    public function friends()
    {
      return $this->hasMany(Friend::class, 'id');
    }
}
