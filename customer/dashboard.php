<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "function.php"; ?>
<?php include "dbconnection.php"; ?>



  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>DASHBOARD</h4><small><span id="date_time"></span></small>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Dahhboard</li>
      </ul>
    </div>

    <?php
      $stmt = $conn->prepare("SELECT * FROM `user_customer` WHERE cust_id=? ");
      $stmt->bind_param("s", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      $erow = $result->fetch_assoc();

      $cust_name = $erow['cust_name'];
      $cust_email = $erow['cust_email'];
      $cust_contact = $erow['cust_contact'];
      $cust_gender = $erow['cust_gender'];
      $cust_age = $erow['cust_age'];
      $cust_address = $erow['cust_address'];

      if(empty($cust_name&&$cust_email&&$cust_contact&&$cust_gender&&$cust_age&&$cust_address)){
        echo "
          <div class='bs-component'>
            <div class='alert alert-dismissible alert-warning'>
              <button class='close' type='button' data-dismiss='alert'>×</button>
              <h5>Attention!</h5>
              <p>Please udpate your profile information.</p>
            </div>
          </div>
        ";
      }
    ?>

    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Dashboard</h5>
            <div class="card-body">
              <div class="row">

                <div class="col-sm-6 col-lg-4" style="margin-bottom:10px;">
                  <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                      <div class="dropdown float-right">
                        <i class="fa fa-cog"></i>
                      </div>
                      <h2 class="mb-0">
                        <span><?php echo queue(); ?></span>
                      </h2>
                      <p class="text-light">Queue Facilities</p>
                      <div class="chart-wrapper px-0" style="height:90px;" height="70">
                        <i class="fa fa-warning fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a onClick="reserve()" style="color:white;decoration:none;">More info&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-lg-4" style="margin-bottom:10px;">
                  <div class="card text-white bg-info">
                    <div class="card-body pb-0">
                      <div class="dropdown float-right">
                        <i class="fa fa-cog"></i>
                      </div>
                      <h2 class="mb-0">
                        <span><?php echo manage(); ?></span>
                      </h2>
                      <p class="text-light">Manage Facilities</p>
                      <div class="chart-wrapper px-0" style="height:90px;" height="70">
                        <i class="fa fa-spinner fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a onClick="used()" style="color:white;decoration:none;">More info&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-lg-4" style="margin-bottom:10px;">
                  <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                      <div class="dropdown float-right">
                        <i class="fa fa-cog"></i>
                      </div>
                      <h2 class="mb-0">
                        <span><?php echo review(); ?></span>
                      </h2>
                      <p class="text-light">Review Facilities</p>
                      <div class="chart-wrapper px-0" style="height:90px;" height="70">
                        <i class="fa fa-star-o fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a onClick="review()" style="color:white;" class="small-box-footer">More info&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
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

</body>
</html>
