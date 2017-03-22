<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Product;
use App\Customer;
class OrderController extends Controller
{
    public function changeToToDo(Request $request) {
      $id = $request->input('statusID');
      $order = Order::find($id);
      $order->status = 'besteld';
      $order->save();
    }
    public function changeToReady(Request $request) {
      $id = $request->input('statusID');
      $order = Order::find($id);
      $order->status = 'gemaakt';
      $order->save();
    }
    public function changeToDone(Request $request) {
      $id = $request->input('statusID');
      $order = Order::find($id);
      $order->status = 'bezorgd';
      $order->save();
    }
}
