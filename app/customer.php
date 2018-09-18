<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{

  public function moneys()
  {
    return $this->belongsToMany('App\money')->withTimestamps();;
  }



}
