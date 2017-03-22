@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @foreach($products as $product)
      <div class="col-md-3">
        <div class="panel panel-default" id="panel-{{$product->id}}">
          <div class="panel-heading">
            Tafel #{{$product->id}} <!-- tafelnr -->
          </div>
          @foreach($product->orders as $orders)
            @if($orders->status != 'besteld')
              <!-- alle bestellingen per tafel -->
              <div class="panel-heading ober-{{$orders->status}}">
                <!-- toggle status -->
                @if($orders->status == 'gemaakt')
                  <button type="button" class="btn btn-default" data-statusId="{{$orders->id}}" onclick="changeToDone(this)"><img class="checks" src="img/todo.png"/></button>
                @else
                  <button type="button" class="btn btn-default" data-statusId="{{$orders->id}}" onclick="changeToReady(this)"><img class="checks" src="img/done.png"/></button>
                @endif
                <p>{{$orders->status}}</p>
              </div>
              @foreach($orders->products as $products)
              <!-- alle producten per bestelling -->
                <div class="panel-body">
                  <h4 class="capitalize">{{ $products->name }}</h4>
                </div>
              @endforeach
            @endif
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
