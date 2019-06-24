<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">
  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>TRANSACTION</h4><small><span id="date_time"></span></small>
      </div>
      <?php include "chatting_seen_notification.php"; ?>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Transaction</li>
        <li class="breadcrumb-item active">Manage Facilities</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Manage Facilities</h5>
            <div class="card-body">
              <div class="bs-component">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a class="nav-link activ e" data-toggle="tab" href="#home">Facilities Start</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Facilities Finish</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade active show" id="home">
                    <?php include "transaction_panel_start_view.php"; ?>
                  </div>
                  <div class="tab-pane fade" id="profile">
                    <?php include "transaction_panel_finish_view.php"; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              &nbsp;&nbsp;
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include "footer.php"; ?>

  <script type="text/javascript">

  $(document).ready(function() {
    $('#list_barcode').keyup(function() {
      var list_barcode = $(this).val();
      $.ajax({
        url: "transaction_panel_start_fetch.php",
        type: "POST",
        dataType: "JSON",
        data: {
          list_barcode: list_barcode
        },
        cache: false,
        success: function(data) {
          $("#cust_name").val(data.cust_name);
          $("#fac_name").val(data.fac_name);
          $("#reserve_time").val(data.reserve_time);
        }
      });
    });
  });

  $(document).ready(function() {
    function autoSaveStart() {
      var list_barcode = $('#list_barcode').val();
      var post_id = $('#post_id').val();
      if (list_barcode != '') {
        $.ajax({
          url: 'transaction_panel_start_check.php',
          method: "POST",
          data: {
            list_barcode: list_barcode
          },
          success: function(data) {
            if (data != '0') {
              $.ajax({
                url: 'transaction_panel_start_avail.php',
                method: "POST",
                data: {
                  list_barcode: list_barcode
                },
                success: function(data) {
                  if (data != '2'){
                    $.ajax({
                      url: "transaction_panel_start_save.php",
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
                      }
                    });
                    alert("Facility Successfully Start!");
                    window.location.reload(true);
                  }else{
                    alert("One Facility Queue!");
                    window.location.reload(true);
                  }
                }
              });
            } else{
              alert("Facility Failed Start!");
              window.location.reload(true);
            }
          }
        });
      }
    }
    setInterval(function() {
      autoSaveStart();
    }, 3000);
  });

  $(document).ready(function() {
    $('#lis_barcode').keyup(function() {
      var lis_barcode = $(this).val();
      $.ajax({
        url: "transaction_panel_finish_fetch.php",
        type: "POST",
        dataType: "JSON",
        data: {
          lis_barcode: lis_barcode
        },
        cache: false,
        success: function(data) {
          $("#cus_name").val(data.cus_name);
          $("#faci_name").val(data.faci_name);
          $("#rve_time").val(data.rve_time);
        }
      });
    });
  });

  $(document).ready(function() {
    function autoSaveFinish() {
      var lis_barcode = $('#lis_barcode').val();
      var pos_id = $('#pos_id').val();
      if (lis_barcode != '') {
        $.ajax({
          url: 'transaction_panel_finish_check.php',
          method: "POST",
          data: {
            lis_barcode: lis_barcode
          },
          success: function(data) {
            if (data != '0') {
              $.ajax({
                url: "transaction_panel_finish_save.php",
                method: "POST",
                data: {
                  lis_barcode: lis_barcode,
                  pos_id: pos_id
                },
                dataType: "text",
                success: function(data) {
                  if (data != '') {
                    $('#pos_id').val(data);
                  }
                }
              });
              alert("Facility Successfully Finish!");
              window.location.reload(true);

            } else {
              alert("Facility Failed Finish!");
              window.location.reload(true);
            }
          }
        });
      }
    }
    setInterval(function() {
      autoSaveFinish();
    }, 3000);
  });
  </script>

</body>
</html>
