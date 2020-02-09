<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['post_id', 'name'];

    public function Post() {
      return $this->belongsTo('App\Item');
    }
}
