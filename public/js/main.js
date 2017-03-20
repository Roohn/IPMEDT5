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
                orderid = value.id;
                status = value.status;
                var name = [];
                var price = [];
                var category = [];
                $.each(value.products, function(key, value) {
                   name.push(value.name);
                   price.push(value.price);
                   category.push(value.category);
                 });

                //maak een 'tabel' voor elke order
                $('.row').append('<div class="col-md-3"><div class="panel panel-default" id="panel-'+orderid+'"><div class="panel-heading '+status+'">Tafel #... Bestelling: '+orderid+'</div></div></div>');

                //vul de order met producten (bestellingen)
                for (var x in name) {
                  $('#panel-' + orderid).append('<div class="panel-body">Bestelling: '+ name[x] +'</div>');
                  $('#panel-' + orderid).append('<div class="panel-body">Category: '+ category[x] +'</div>');
                  $('#panel-' + orderid).append('<div class="panel-body">-------------------------</div>');
                }
              });
            } else {
              console.log('Nothing in the DB');
            }
        }
    }, "json");
}
