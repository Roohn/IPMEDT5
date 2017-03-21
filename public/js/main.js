function changeToDone(id) {
  statusID = id.getAttribute('data-statusId');

  $.ajaxSetup({
          headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

  $.ajax({
      type: "GET",
      url: '/changeToDone',
      data: {statusID: statusID},
      success: function( msg ) {
        location.reload();
      }
  });
}

function changeToDo(id) {
  statusID = id.getAttribute('data-statusId');

  $.ajaxSetup({
          headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

  $.ajax({
      type: "GET",
      url: '/changeToDo',
      data: {statusID: statusID},
      success: function( msg ) {
        location.reload();
      }
  });
}
