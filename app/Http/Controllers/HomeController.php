<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Product;
use App\Customer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Customer::with('orders.products')->get();
        return view('home')->with('products', $products);
    }

    public function ober()
    {
        $products = Customer::with('orders.products')->get();
        return view('ober')->with('products', $products);
    }

    public function product()
    {
      $products = Product::all();
      return view('product')->with('products', $products);
    }

}
