<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'oneword', 'identification_id', 'profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
      return $this->belongsToMany('App\Group')->using('App\GroupUser');
    }
    // public function groups() {
    //   return $this->belongsToMany(Group::class, 'group_user')->using(GroupUser::class)->withPivot(['role_id']);
    // }
    public function groups() {
      return $this->belongsToMany('App\Group');
    }
}
