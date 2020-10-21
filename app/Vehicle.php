<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

  public function character()
  {
    return $this->belongsTo('App\Character', 'owner');
  }

  public function shop()
  {
    return $this->belongsTo('App\Shop', 'vehicle_shop_id');
  }

  public function hasShop(){

    return (bool) $this->shop()->first();
}

}
