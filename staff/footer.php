
<script src="../js/date_time.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/plugins/pace.min.js"></script>
<script src="../js/plugins/jquery.dataTables.min.js"></script>
<script src="../js/plugins/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">
<!--Instruction Popover-->
$('#popoverInfo').popover();
$('#btn_extreme').popover();

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
  $('#cust_ic').keyup(function() {
    var cust_ic = $(this).val();
    // $.ajax({
    //   url: 'transaction_panel_fetch_check.php',
    //   method: "POST",
    //   data: {
    //     cust_ic: cust_ic
    //   },
    //   success: function(data) {
        // if (data != '0') {
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
    //     } else {
    //       alert("Visitor need to make a new register!");
    //       window.location.reload(true);
    //     }
    //   }
    // });
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

<!--Unseen Message-->
$(document).ready(function(){

  load_unseen();

  function load_unseen() {
    $(document).ready(function() {
      $('#staff_id').ready(function() {
        var staff_id = $("#staff_id").val();
        $.ajax({
          url:"chatting_unseen_notification.php",
          method:"POST",
          data: {
            staff_id: staff_id
          },
          success: function(data) {
            $('#unseen_message').html(data);
          }
        });
      });
    });
  }

  setInterval(function(){
    load_unseen();
  }, 3000);

});

<!--Notifications Message-->
$(document).ready(function(){

  load_last_notification();

  function load_last_notification()
  {
    $(document).ready(function() {
      $('#staff_id').ready(function() {
        var staff_id = $("#staff_id").val();
        $.ajax({
          url:"chatting_fetch_notification.php",
          method:"POST",
          data: {
            staff_id: staff_id
          },
          success: function(data) {
            $('#notification').html(data);
          }
        });
      });
    });
  }

  setInterval(function(){
   load_last_notification();
 }, 3000);

});

<!--Chatting Application-->
$(document).ready(function(){

  fetch_user();

  setInterval(function(){
    update_last_activity();
    fetch_user();
    update_chat_history_data();
  }, 4000);

  function fetch_user()
  {
    $.ajax({
      url:"chatting_fetch_user.php",
      method:"POST",
      success:function(data){
        $('#user_details').html(data);
      }
    })
  }

  function update_last_activity()
  {
    $.ajax({
      url:"chatting_update_last_activity.php",
      success:function()
      {

      }
    })
  }

  function make_chat_dialog_box(to_user_id, to_user_name)
  {
    var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="'+to_user_name+'">';
    modal_content += '<div style="height:260px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:10px; padding:2px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
    modal_content += fetch_user_chat_history(to_user_id);
    modal_content += '</div>';
    modal_content += '<div class="form-group">';
    modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
    modal_content += '</div><div class="form-group" align="right">';
    modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-primary btn-sm send_chat"><i class="fa fa-check-square""> Send</button></div></div>';
    $('#user_model_details').html(modal_content);
  }

  $(document).on('click', '.start_chat', function(){
    var to_user_id = $(this).data('tostaffid');
    var to_user_name = $(this).data('tostaffemail');
    make_chat_dialog_box(to_user_id, to_user_name);
    $("#user_dialog_"+to_user_id).dialog({
      autoOpen:false,
      width:520
    });
    $('#user_dialog_'+to_user_id).dialog('open');
    $('#chat_message_'+to_user_id).emojioneArea({
      pickerPosition:"top",
      toneStyle: "bullet"
    });
  });

  $(document).on('click', '.send_chat', function(){
    var to_user_id = $(this).attr('id');
    var chat_message = $('#chat_message_'+to_user_id).val();
    $.ajax({
      url:"chatting_insert_chat.php",
      method:"POST",
      data:{to_user_id:to_user_id, chat_message:chat_message},
      success:function(data)
      {
        var element = $('#chat_message_'+to_user_id).emojioneArea();
        element[0].emojioneArea.setText('');
        $('#chat_history_'+to_user_id).html(data);
      }
    })
  });

  function fetch_user_chat_history(to_user_id)
  {
    $.ajax({
      url:"chatting_fetch_user_chat_history.php",
      method:"POST",
      data:{to_user_id:to_user_id},
      success:function(data){
        $('#chat_history_'+to_user_id).html(data);
      }
    })
  }

  function update_chat_history_data()
  {
    $('.chat_history').each(function(){
      var to_user_id = $(this).data('touserid');
      fetch_user_chat_history(to_user_id);
    });
  }

  $(document).on('click', '.ui-button-icon', function(){
    $('.user_dialog').dialog('destroy').remove();
  });

  $(document).on('focus', '.chat_message', function(){
    var is_type = 'yes';
    $.ajax({
      url:"chatting_update_is_type_status.php",
      method:"POST",
      data:{is_type:is_type},
      success:function()
      {
      }
    })
  });

  $(document).on('blur', '.chat_message', function(){
    var is_type = 'no';
    $.ajax({
      url:"chatting_update_is_type_status.php",
      method:"POST",
      data:{is_type:is_type},
      success:function()
      {
      }
    })
  });

  $(document).on('click', '.remove_chat', function(){
    var chat_message_id = $(this).attr('id');
    $.ajax({
      url:"chatting_remove_chat.php",
      method:"POST",
      data:{chat_message_id:chat_message_id},
      success:function(data)
      {
        update_chat_history_data();
      }
    })
  });

});


</script>
