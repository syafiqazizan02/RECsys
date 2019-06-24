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
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Transaction</li>
        <li class="breadcrumb-item active">Reserve Facilities</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Reserve Facilities</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label">Customer ID :</label>
                      <input class="form-control" type="number" name="cust_ic" id="cust_ic" placeholder="Customer ID" autofocus>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Customer Name :</label>
                      <input class="form-control" type="text" name="cust_name" id="cust_name" readonly>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Customer Email :</label>
                      <input class="form-control" type="text" name="cust_email" id="cust_email" readonly>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Customer Contact :</label>
                      <input class="form-control" type="text" name="cust_contact" id="cust_contact" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="row" id="display_list">
                  </div>
                </div>
                <div class="col-md-12" align="right">
                  <button type="button" name="add_facilities" id="add_facilities" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-lg fa-plus-circle"></i>Add</button><br><br>
                </div>
                <div class="col-md-12">
                  <form id="user_form">
                    <div id="display_detail">
                    </div>
                    <div align="center">
                      <input type="hidden" name="hidden_cust_id" id="cust_id" size="1">
                      <button type="submit" name="insert_facilities" id="insert_facilities" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-lg fa-check-circle"></i>Insert</button>&nbsp;&nbsp;
                      <button type="button" name="clear_facilities" id="clear_facilities" class="btn btn-secondary btn-sm" style="color:#ffffff;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Clear</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-footer">
              &nbsp;&nbsp;
            </div>
          </div>
        </div>
      </main>

      <?php include "footer.php"; ?>

    </body>
    </html>
