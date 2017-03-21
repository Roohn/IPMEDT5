@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @foreach($products as $product)
      <div class="col-md-3">
        <div class="panel panel-default" id="panel-{{$product->id}}">
          <div class="panel-heading">
            Tafel # {{$product->id}} <!-- tafelnr -->
          </div>
          @foreach($product->orders as $orders)
            <!-- alle bestellingen per tafel -->
            <div class="panel-heading {{$orders->status}}">
              <!-- toggle status -->
              @if($orders->status == 'besteld')
                <img class="checks" data-statusId="{{$orders->id}}" onclick="changeToDone(this)" src="img/todo.png"/>
              @else
                <img class="checks" data-statusId="{{$orders->id}}" onclick="changeToDo(this)" src="img/done.png"/>
              @endif
            </div>
            @foreach($orders->products as $products)
            <!-- alle producten per bestelling -->
              <div class="panel-body">
                {{ $products->name }}
              </div>
            @endforeach
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
