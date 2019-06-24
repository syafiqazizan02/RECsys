<script src="../js/date_time.js"></script>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/plugins/pace.min.js"></script>
<script src="../js/plugins/jquery.dataTables.min.js"></script>
<script src="../js/plugins/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
if ('serviceWorker' in navigator) {
  navigator.serviceWorker
  .register('./service-worker.js')
  .then(function() { console.log('Service Worker Registered'); });
}
</script>

<script type="text/javascript">

<!--DateTime On Load-->
$(document).ready(function(){
  window.onload = date_time('date_time');
});

$('#data-table').DataTable();

function dashboard() {
  window.location.assign("dashboard.php");
}

function qrcode() {
  window.location.assign("account_qrcode_panel.php");
}

function profile() {
  window.location.assign("account_profile_panel.php");
}

function reserve() {
  window.location.assign("transaction_queue_list.php");
}

function used() {
  window.location.assign("transaction_queue_view.php");
}

function review() {
  window.location.assign("transaction_review_list.php");
}

function history() {
  window.location.assign("transaction_history_list.php");
}

function logout() {
  window.location.assign("../logout.php");
}

$(document).ready(function(){

  load_business_data();

  function load_business_data()
  {
    $(document).ready(function() {
      $('#list_id').ready(function() {
        var list_id = $("#list_id").val();
        $.ajax({
          url:"transaction_review_fetch.php",
          method:"POST",
          data: {
            list_id: list_id
          },
          success:function(data)
          {
            $('#business_list').html(data);
          }
        });
      });
    });
  }

  $(document).on('mouseenter', '.rating', function(){
    var index = $(this).data("index");
    var list_id = $(this).data('list_id');
    remove_background(list_id);
    for(var count = 1; count<=index; count++)
    {
      $('#'+list_id+'-'+count).css('color', '#ffcc00');
    }
  });

  function remove_background(list_id)
  {
    for(var count = 1; count <= 5; count++)
    {
      $('#'+list_id+'-'+count).css('color', '#ccc');
    }
  }

  $(document).on('mouseleave', '.rating', function(){
    var index = $(this).data("index");
    var list_id = $(this).data('list_id');
    var rating = $(this).data("rating");
    remove_background(list_id);

    for(var count = 1; count<=rating; count++)
    {
      $('#'+list_id+'-'+count).css('color', '#ffcc00');
    }
  });

  $(document).on('click', '.rating', function(){
    var index = $(this).data("index");
    var list_id = $(this).data('list_id');
    var fac_id = $("#fac_id").val();
    $.ajax({
      url:"transaction_review_insert.php",
      method:"POST",
      data:{index:index, list_id:list_id, fac_id:fac_id},
      success:function(data)
      {
        if(data == 'Done')
        {
          load_business_data();
          alert("You have rate "+index +" out of 5");
          window.location.assign("transaction_review_list.php");
        }
        else
        {
          alert("There is some problem in System");
        }
      }
    });

  });

});
</script>
