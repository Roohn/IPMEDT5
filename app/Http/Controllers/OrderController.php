<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Product;
class OrderController extends Controller
{
  public function getBestellingen()
  {
    $array = array();
    $count = Order::count();

    for ($ordernumber = 1; $ordernumber <= $count; $ordernumber++) {
      $order = Order::find($ordernumber);

      foreach ($order->products as $product) {
          array_push($array, $product);
      }
    }

    return $array;
  }
}
