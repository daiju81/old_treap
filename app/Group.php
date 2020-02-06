<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
      'name', 'image_name', 'host_user_id'
    ];

    // public function group_user() {
    //   return $this->hasMany('App\Post');
    // }
    public function users() {
      return $this->belongsToMany('App\User');
    }
}
