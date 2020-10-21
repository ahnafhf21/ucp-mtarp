<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
  protected $fillable = [
      'char_id', 'payment_method', 'payment_amount', 'donate_type', 'status', 'evidence', 'payment_date', 'notes',
  ];
  protected $dates = [
      'payment_date',
  ];
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function character()
  {
    return $this->belongsTo('App\Character', 'char_id');
  }
}
