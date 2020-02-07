<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupUser extends Model
{
    //
    protected $table = 'group_user';

    // public function role() {
    //   return $this->belongsTo(Role::class);
    // }
    public $timestamps = false;
}
