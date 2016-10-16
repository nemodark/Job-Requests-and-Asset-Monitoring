 function update() {
  $("#notif").html('Loading..'); 
  $.ajax({
    type: 'GET',
    url: 'nav.php',
    timeout: 2000,
    success: function(data) {
      $("#notif").html(data);
      $("#notif").html(''); 
      window.setTimeout(update, 10000);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      $("#notif").html('Timeout contacting server..');
      window.setTimeout(update, 60000);
    }
});
}
$(document).ready(function() {
    update();
});