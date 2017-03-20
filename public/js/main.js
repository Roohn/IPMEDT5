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
          console.log(data);
            if(data.length > 0) {
              //pak alle data uit het JSON file en stop het in een array
              var bestellingen = Object.create(null);

              //haal alle informatie op uit de array
              $.each(data, function(key, value) {
                tafelnr = value.id;
                $.each(value.orders, function(key, value) {
                  orderid = value.id;
                  status = value.status;
                  ordered_on = value.ordered_on;
                  var name = [];
                  var price = [];
                  var category = [];
                  $.each(value.products, function(key, value) {
                     name.push(value.name);
                     price.push(value.price);
                     category.push(value.category);
                   });

                  //maak een 'tabel' voor elke order
                  if ($("#panel-"+tafelnr).length == 0) {
                    $('.row').append('<div class="col-md-3"><div class="panel panel-default" id="panel-'+tafelnr+'"><div class="panel-heading '+status+'">Tafel # '+tafelnr+' Bestelling: '+orderid+'</div></div></div>');
                  }
                  else {
                    $('#panel-'+tafelnr).append('<div class="panel-heading '+status+'">Bestelling: '+orderid+'</div>');
                  }

                  //vul de order met producten (bestellingen)
                  for (var x in name) {
                    $('#panel-' + tafelnr).append('<div class="panel-body">Bestelling: '+ name[x] +'</div>');
                    $('#panel-' + tafelnr).append('<div class="panel-body">Category: '+ category[x] +'</div>');
                    $('#panel-' + tafelnr).append('<div class="panel-body">-------------------------</div>');
                  }
                  $('#panel-' + tafelnr).append('<div class="panel-body">Tijd: '+ ordered_on +'</div>');

                });
              });
            } else {
              console.log('Nothing in the DB');
            }
        }
    }, "json");
}
