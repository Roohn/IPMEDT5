@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="voorgerechtpanel">
            Voorgerechten
          </div>
          @foreach($products as $product)
            @if($product->category == "voorgerecht")
              <div class="panel-body">
                Product: {{$product->name}} <br>
                Prijs: {{$product->price}} euro
              </div>
              <div class="panel-footer"><a href="/aanpassen/{{$product->id}}"><button class="btn btn-default btn-aanpassen">Aanpassen</button></a></div>
            @endif
          @endforeach
        </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="hoofgerechtpanel">
            Hoofdgerechten
          </div>
          @foreach($products as $product)
            @if($product->category == "hoofdgerecht")
              <div class="panel-body">
                Product: {{$product->name}} <br>
                Prijs: {{$product->price}} euro
              </div>
              <div class="panel-footer"><a href="/aanpassen/{{$product->id}}"><button class="btn btn-default btn-aanpassen">Aanpassen</button></a></div>
            @endif
          @endforeach
        </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="nagerechtpanel">
            Nagerechten
          </div>
          @foreach($products as $product)
            @if($product->category == "nagerecht")
              <div class="panel-body">
                Product: {{$product->name}} <br>
                Prijs: {{$product->price}} euro
              </div>
              <div class="panel-footer"><a href="/aanpassen/{{$product->id}}"><button class="btn btn-default btn-aanpassen">Aanpassen</button></a></div>
            @endif
          @endforeach
        </div>
      </div>
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-heading" id="drankenpanel">
          Dranken
        </div>
        @foreach($products as $product)
          @if($product->category == "drank")
            <div class="panel-body">
              Product: {{$product->name}} <br>
              Prijs: {{$product->price}} euro
            </div>
            <div class="panel-footer"><a href="/aanpassen/{{$product->id}}"><button class="btn btn-default btn-aanpassen">Aanpassen</button></a></div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
  <div class="">
    <button class="btn btn-success btn-add" id="addproduct" data-toggle="modal" data-target=".addproduct-modal">Voeg product toe</button>
  </div>
</div>
<div class="modal fade addproduct-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Welk product wilt u toevoegen?</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="/addproduct">
          <!-- nodig voor laravel -->
          {{ csrf_field() }}

          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Naam</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="name" placeholder="Productnaam">
            </div>
          </div>
          <div class="form-group">
            <label for="price" class="col-sm-2 control-label">Prijs</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="price" id="price" placeholder="0.00">
            </div>
          </div>
          <div class="form-group">
            <label for="category" class="col-sm-2 control-label">Categorie</label>
            <div class="col-sm-10">
              <select class="form-control" name="category" id="category">
                <option>voorgerecht</option>
                <option>hoofdgerecht</option>
                <option>nagerecht</option>
                <option>drank</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Toevoegen</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
