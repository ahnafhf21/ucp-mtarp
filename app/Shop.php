<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  protected $table = 'vehicles_shop';

  public function vehicles()
  {
    return $this->hasMany('App\Vehicle', 'vehicle_shop_id');
  }
}
