<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Product;
class ProductController extends Controller
{
    public function addproduct() {
      //kijk of alles ingevuld is
      $this->validate(request(),[
        'name' => 'required',
        'price' => 'required',
        'category' => 'required'
      ]);

      $product = new Product;
      $product->name = Input::get('name');
      $product->price = Input::get('price');
      $product->category = Input::get('category');
      $product->save();

      return redirect('/product');
    }

    public function delete($id) {
      $product = Product::find($id);
      $product->delete();
      return redirect('/product');
    }

}
