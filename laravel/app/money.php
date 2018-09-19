<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class money extends Model
{
  protected $table='moneys';
  protected $fillable=['nominal_penukaran'];

}
