
<script src="../js/date_time.js"></script>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/plugins/pace.min.js"></script>
<script src="../js/plugins/jquery.dataTables.min.js"></script>
<script src="../js/plugins/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
<!--Data Table-->
$('#data-table').DataTable();

<!--DateTime On Load-->
$(document).ready(function(){
  window.onload = date_time('date_time');
});

<!--On Active/Inactive Extreme Status-->
$(document).ready(function(){
  $('#btn_extreme').click(function(){
    if(confirm("Are you sure?")){
      var id = [];
      $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
      });
      if(id.length === 0){
        alert("Please Tick at least One Checkbox!");
      }else{
        $.ajax({
          url:"maintenance_extreme_view_fetch.php",
          method:"POST",
          data:{id:id},
          success:function(){
            alert("Successfully Change Availability Status!");
            window.location.reload(true);
          }
        });
      }
    }else{
      return false;
    }
  });
});

<!--Onkeyup Customer Info-->
$(document).ready(function() {
  $('#cust_ic').change(function() {
    var cust_ic = $(this).val();
    $.ajax({
      url: 'transaction_panel_fetch_check.php',
      method: "POST",
      data: {
        cust_ic: cust_ic
      },
      success: function(data) {
        if (data != '0') {
          $.ajax({
            url: "transaction_panel_fetch_customer.php",
            type: "POST",
            dataType: "JSON",
            data: {
              cust_ic: cust_ic
            },
            cache: false,
            success: function(data) {
              $("#cust_id").val(data.cust_id);
              $("#cust_ic").val(data.cust_ic);
              $("#cust_name").val(data.cust_name);
              $("#cust_email").val(data.cust_email);
              $("#cust_contact").val(data.cust_contact);
            }
          });
        } else {
          alert("Customer information not exist. Please make new register!");
          window.location.reload(true);
        }
      }
    });
  });
});

<!--Transaction Reserve Panel-->
$(document).ready(function() {
  load_list();
  load_detail();

  function load_list() {
    $.ajax({
      url: "transaction_panel_fetch_list.php",
      method: "POST",
      success: function(data) {
        $('#display_list').html(data);
      }
    });
  }

  function load_detail() {
    $.ajax({
      url: "transaction_panel_fetch_detail.php",
      method: "POST",
      success: function(data) {
        $('#display_detail').html(data);
      }
    });
  }

  $(document).on('click', '.select_facilities', function() {
    var facilities_id = $(this).data('facilities_id');
    if ($(this).prop('checked') == true) {
      $('#facilities_' + facilities_id).css('background-color', '#f1f1f1');
      $('#facilities_' + facilities_id).css('border-color', '#333');
    } else {
      $('#facilities_' + facilities_id).css('background-color', 'transparent');
      $('#facilities_' + facilities_id).css('border-color', '#ccc');
    }
  });

  $(document).on('click', '#add_facilities', function() {
    var cust_ic = '';
    var error_cust_ic = '';
    if ($('#cust_ic').val() == '') {
      error_cust_ic = alert('Customer ID required!');
      $('#error_cust_ic').text(error_cust_ic);
      cust_ic = '';
    } else {
      error_cust_ic = '';
      $('#error_cust_ic').text(error_cust_ic);
      cust_ic = $('#cust_ic').val();
    }

    if (error_cust_ic != '') {
      location.reload();
    } else {
      var totalRowCount = 0;
      var table = document.getElementById("facilities_table");
      var rows = table.getElementsByTagName("tr")
      for (var i = 0; i < rows.length; i++) {
        totalRowCount++;
      }
      var dataOnTable = (totalRowCount - (2));
      if (dataOnTable >=3) {
        alert("Limit only 3 facilities per package!");
      } else {
        var facilities_id = [];
        var facilities_name = [];
        var facilities_rate = [];
        var action = "add";

        $('.select_facilities').each(function() {
          if ($(this).prop('checked') == true) {
            facilities_id.push($(this).data('facilities_id'));
            facilities_name.push($(this).data('facilities_name'));
            facilities_rate.push($(this).data('facilities_rate'));
          }
        });

        if (facilities_id.length > 0) {
          if (facilities_id.length > 3) {
            alert("Limit only 3 facilities per package!");
          }else{
            $.ajax({
              url: "transaction_panel_fetch_action.php",
              method: "POST",
              data: {
                facilities_id: facilities_id,
                facilities_name: facilities_name,
                facilities_rate: facilities_rate,
                action: action
              },
              success: function(data) {
                $('.select_facilities').each(function() {
                  if ($(this).prop('checked') == true) {
                    $(this).attr('checked', false);
                    var temp_facilities_id = $(this).data('facilities_id');
                    $('#facilities_' + temp_facilities_id).css('background-color', 'transparent');
                    $('#facilities_' + temp_facilities_id).css('border-color', '#ccc');
                  }
                });
                load_detail();
              }
            });
          }
        }else {
          alert('Select atleast one facilities!');
        }
      }
    }
  });

  $(document).on('click', '#insert_facilities', function() {
    $('#user_form').on('submit', function(event) {
      event.preventDefault();
      var cust_ic = '';
      var error_cust_ic = '';
      if ($('#cust_ic').val() == '') {
        error_cust_ic = alert('Customer ID required!');
        $('#error_cust_ic').text(error_cust_ic);
        cust_ic = '';
      } else {
        error_cust_ic = '';
        $('#error_cust_ic').text(error_cust_ic);
        cust_ic = $('#cust_ic').val();
      }

      if (error_cust_ic != '') {
        location.reload();
      } else {
        var totalRowCount = 0;
        var table = document.getElementById("facilities_table");
        var rows = table.getElementsByTagName("tr")
        for (var i = 0; i < rows.length; i++) {
          totalRowCount++;
        }
        var dataOnTable = (totalRowCount - (2));
        if (dataOnTable > 0) {
          var form_data = $(this).serialize();
          $.ajax({
            url: "transaction_panel_fetch_facilities.php",
            method: "POST",
            data: form_data,
            success: function(data) {
              var action = 'empty';
              $.ajax({
                url: "transaction_panel_fetch_action.php",
                method: "POST",
                data: {
                  action: action
                },
                success: function() {
                  alert("Successfully reserved the facilities!");
                  window.location.reload(true);
                  load_detail();
                }
              })
            }
          })
        } else {
          alert("Added atleast one facilities!");
        }
      }
    });
  });

  $(document).on('click', '#clear_facilities', function() {
    var action = 'empty';
    $.ajax({
      url: "transaction_panel_fetch_action.php",
      method: "POST",
      data: {
        action: action
      },
      success: function() {
        load_detail();
        alert("Facilities has been clear!");
      }
    });
  });
});

<!--On Active/Inactive Staff Status-->
$(document).ready(function(){
  $('#btn_active').click(function(){
    if(confirm("Are you sure?")){
      var id = [];
      $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
      });
      if(id.length === 0){
        alert("Please Tick at least One Checkbox!");
      }else{
        $.ajax({
          url:"registration_staff_ajax.php",
          method:"POST",
          data:{id:id},
          success:function(){
            alert("Successfully Change Staff Status!");
            window.location.reload(true);
          }
        });
      }
    }else{
      return false;
    }
  });
});

</script>
