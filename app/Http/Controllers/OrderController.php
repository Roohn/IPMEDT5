<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Product;
use App\Customer;
class OrderController extends Controller
{
  public function getBestellingen()
  {
    $array = array();
    $products = Customer::with('orders.products')->get();

    return $products;
  }
}
