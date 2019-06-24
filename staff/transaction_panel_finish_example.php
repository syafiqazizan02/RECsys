<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Recreation Park Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <br/>
      <h2 align="center">Facilities Finish</h2>
      <br/>
      <div class="form-group">
        <label>Facilities Barcode:</label>
        <input type="text" name="list_barcode" id="list_barcode" class="form-control" autofocus/>
      </div>
      <div class="form-group">
        <input type="hidden" name="post_id" id="post_id" />
        <div id="autoSave"></div>
      </div>
    </div>
  </body>
</html>
<script>
$(document).ready(function() {
  function autoSave() {
    var list_barcode = $('#list_barcode').val();
    var post_id = $('#post_id').val();
    if (list_barcode != '') {
      $.ajax({
        url: 'transaction_panel_finish_check.php',
        method: "POST",
        data: {
          list_barcode: list_barcode
        },
        success: function(data) {
          if (data != '0') {
            $.ajax({
              url: "transaction_panel_finish_save.php",
              method: "POST",
              data: {
                list_barcode: list_barcode,
                post_id: post_id
              },
              dataType: "text",
              success: function(data) {
                if (data != '') {
                  $('#post_id').val(data);
                }
                alert("Successfully Finish!");
                window.location.reload(true);
              }
            });
          } else {
            alert("Data Not Available!");
            window.location.reload(true);
          }
        }
      });
    }
  }
  setInterval(function() {
    autoSave();
  }, 6000);
});
</script>
