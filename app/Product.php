<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  //Product__belongs_to_many__orders
  public function orders(){
    return $this->belongsToMany('App\Order');
  }
}
