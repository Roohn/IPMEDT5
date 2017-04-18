$(document).ready(function() {
  $('#addproduct').click(function() {
    // show form to add products

  });
});

function changeToToDo(id) {
  statusID = id.getAttribute('data-statusId');

  $.ajaxSetup({
          headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

  $.ajax({
      type: "GET",
      url: '/changeToToDo',
      data: {statusID: statusID},
      success: function( msg ) {
        location.reload();
      }
  });
}

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
