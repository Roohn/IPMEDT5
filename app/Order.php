<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  //Order__belongs_to_many__Products
  public function products() {
    return $this->belongsToMany('App\Product');
  }
}
