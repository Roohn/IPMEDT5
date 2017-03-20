$(document).ready(function(){
    getBestellingen();
});

function getBestellingen() {
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    //haal alle bestellingen op uit de database
    $.ajax({
        type: "GET",
        url : "/bestellingen",
        data : "",
        dataType : "json",
        success : function(data){
            if(data.length > 0) {
              //pak alle data uit het JSON file en stop het in een array
              var bestellingen = Object.create(null);

              for (var i = 0; i < data.length; i++) {
                var item = data[i];

                if(!bestellingen[item.pivot.order_id]) {
                  bestellingen[item.pivot.order_id] = [];
                }

                bestellingen[item.pivot.order_id].push({
                  Name: item.name,
                  Category: item.category,
                  Price: item.price
                });
              }

              var result = [];

              for (var x in bestellingen) {
                var obj = {};
                obj[x] = bestellingen[x];
                result.push(obj);
              }

              //haal alle informatie op uit de array
              $.each(result, function(key, value) {
                $.each(value, function(key, value) {
                  orderid = parseInt(key);
                  var name = [];
                  var price = [];
                  var category = [];
                  $.each(value, function(key, value) {
                     name.push(value.Name);
                     price.push(value.Price);
                     category.push(value.Category);
                  });

                  //maak een 'tabel' voor elke order
                  $('.row').append('<div class="col-md-3"><div class="panel panel-default" id="panel-'+orderid+'"><div class="panel-heading">Tafel #... Bestelling: '+orderid+'</div></div></div>');

                  //vul de order met producten (bestellingen)
                  for (var x in name) {
                    $('#panel-' + orderid).append('<div class="panel-body">Bestelling: '+ name[x] +'</div>');
                    $('#panel-' + orderid).append('<div class="panel-body">Category: '+ category[x] +'</div>');
                    $('#panel-' + orderid).append('<div class="panel-body">-------------------------</div>');
                  }
                });

              });
            } else {
              console.log('Nothing in the DB');
            }
        }
    }, "json");
}
