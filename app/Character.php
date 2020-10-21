<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function user()
    {
      return $this->belongsTo('App\User', 'account');
    }

    public function interiors()
    {
      return $this->hasMany('App\Interior', 'owner');
    }

    public function vehicles()
    {
      return $this->hasMany('App\Vehicle', 'owner');
    }
}
