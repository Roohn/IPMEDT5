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
    $products = Order::with('products')->get();

    return $products;
  }
}
