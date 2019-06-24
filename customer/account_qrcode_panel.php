<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">
  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>ACCOUNT</h4><small><span id="date_time"></span></small> 
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Account</li>
        <li class="breadcrumb-item active">My QRcode</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">My QRcode</h5>
            <div class="card-body">

              <?php
              include "../qrcode/libs/phpqrcode/qrlib.php";
              include "dbconnection.php";

              $cust_id = $id;

              $stmt = $conn->prepare("SELECT * FROM `user_customer` WHERE cust_id=? ");
              $stmt->bind_param("s", $cust_id);
              $stmt->execute();
              $result = $stmt->get_result();
              $erow = $result->fetch_assoc();

              $cust_name = $erow['cust_name'];
              $cust_ic = $erow['cust_ic'];
              $cust_email = $erow['cust_email'];
              $cust_contact = $erow['cust_contact'];
              $cust_gender= $erow['cust_gender'];
              $cust_address = $erow['cust_address'];
              $cust_register = date_format(date_create($erow['cust_register']), 'd M Y');

              $no = $cust_ic;
              $tempDir = '../qrcode/temp/';
              $email = $no;
              $filename = $email;
              $codeContents = $email;
              QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
              ?>

              <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                  <?php  echo '<img src="../qrcode/temp/'. @$filename.'.png" style="width:300px; height:300px;">'; ?>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-6"><br /><br />
                  <table border="0">
                    <thead align="center">
                      <tr>
                        <th colspan="3"><h3><?php echo $cust_name; ?></h3></th>
                      </tr>
                    </thead>
                    <tbody >
                      <tr>
                        <td colspan="2"><br /></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Email</b></td>
                        <td width="5%">:</td>
                        <td width="80%"><?php echo $cust_email; ?></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Contact</b></td>
                        <td width="5%">:</td>
                        <td width="80%">+6<?php echo $cust_contact; ?></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Gender</b></td>
                        <td width="5%">:</td>
                        <td width="80%"><?php echo $cust_gender; ?></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Address</b></td>
                        <td width="5%">:</td>
                        <td width="80%"><?php echo $cust_address; ?></td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Registration</b></td>
                        <td width="5%">:</td>
                        <td width="80%"><?php echo $cust_register; ?></td>
                      </tr>
                    </tbody>
                  </table>
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
