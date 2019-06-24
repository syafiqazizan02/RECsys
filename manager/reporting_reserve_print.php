<?php

if(isset($_POST['submit']))
{
  include('../qrcode/libs/phpqrcode/qrlib.php');

   $start_id = $_POST['start_id'];

   include "dbconnection.php";

    $stmt = $conn->prepare("SELECT start.start_id as start_id, start.start_random as start_random, start.start_date as start_date,  customer.cust_ic as cust_ic, customer.cust_name as cust_name, customer.cust_email as cust_email, customer.cust_contact as cust_contact
    FROM `used_start` AS start
    JOIN `user_customer` AS customer ON start.cust_id=customer.cust_id AND start.start_id=?");
    $stmt->bind_param("s", $start_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $start_id =  $row['start_id'];
    $start_random =  $row['start_random'];
    $start_date = date_format(date_create($row['start_date']), 'd/m/Y');
    $start_time = date_format(date_create($row['start_date']), 'g:i A');
    $cust_ic = $row['cust_ic'];
    $cust_name = $row['cust_name'];
    $cust_email = $row['cust_email'];
    $cust_contact = $row['cust_contact'];
  }

  ?>
  <html>
  <head>
    <title>Recreation Park Management System</title>
    <link rel="stylesheet" href="../qrcode/libs/css/bootstrap.min.css">
	   <link rel="stylesheet" href="../qrcode/libs/style.css">
  </head>

  <body>

      <div align="center">
        <h4 style="font-weight:bold;">Recreation Park Management System</h4>
        Pusat Rekreasi Air,<br>
        Jalan Tasik, 75450 Ayer Keroh,<br>
        Melaka.
      </div><br>

      <center><b>Queue ID :</b>&nbsp;&nbsp;<?php echo $start_random; ?></center><br>

      <div style="float:left;">
        <table>
          <tr>
            <td><b>&nbsp;&nbsp;&nbsp;&nbsp;Customer IC</b></td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td><?php echo $cust_ic; ?></td>
          </tr>
          <tr>
            <td><b>&nbsp;&nbsp;&nbsp;&nbsp;Customer Name</b></td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td><?php echo $cust_name; ?></td>
          </tr>
          <tr>
            <td><b>&nbsp;&nbsp;&nbsp;&nbsp;Customer Email</b></td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td><?php echo $cust_email; ?></td>
          </tr>
          <tr>
            <td><b>&nbsp;&nbsp;&nbsp;&nbsp;Customer Contact</b></td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>+6<?php echo $cust_contact; ?></td>
          </tr>
        </table>
      </div>

      <div style="float:right;">
        <table>
          <tr height="30">
            <td style="border: 1px solid black;"><b>&nbsp;&nbsp;Reserve Date&nbsp;&nbsp;:&nbsp;&nbsp;</b></td>
            <td style="border: 1px solid black;"  align="center" >&nbsp;&nbsp;<?php echo $start_date; ?>&nbsp;&nbsp;</td>
          </tr>
          <tr height="30">
            <td style="border: 1px solid black;"><b>&nbsp;&nbsp;Reserve Time&nbsp;&nbsp;:&nbsp;&nbsp;</b></td>
            <td style="border: 1px solid black;"  align="center" >&nbsp;&nbsp;<?php echo $start_time; ?>&nbsp;&nbsp;</td>
          </tr>
        </table>
      </div><br><br><br><br><br><br>

      <div class="box-body table-responsive">

        <table border="1" cellpadding="0" cellspacing="0" width="100%">
          <thead>
            <tr height="30px">
              <th><center>Facilities QRcode</center></th>
              <th><center>Facilities Category</center></th>
              <th><center>Start</center></th>
              <th><center>Finish</center></th>
              <th><center>Rate</center></th>
              <th><center>Quantity</center></th>
              <th><center>Amount</center></th>
            </tr>
          </thead>
          <?php

          include "dbconnection.php";

          $stmt2 = $conn->prepare("SELECT used.list_barcode as list_barcode, used.list_qty as list_qty, used.list_total as list_total,  used.list_start as list_start,  used.list_finish as list_finish, category.fac_name as fac_name, category.fac_rate as fac_rate
            FROM `used_list` AS used
            JOIN `facility_category` AS category ON used.fac_id=category.fac_id
            JOIN `used_start` AS start ON used.start_id=start.start_id
            AND used.start_id =?");

            $stmt2->bind_param("s", $start_id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            $price_total = 0;

            while($row2 = $result2->fetch_assoc())
            {
              $list_barcode = $row2['list_barcode'];
              $fac_name = $row2['fac_name'];
              $list_start = date_format(date_create($row2 ['list_start']), 'g:i A');
              $list_finish = date_format(date_create($row2 ['list_finish']), 'g:i A');
              $list_qty = $row2['list_qty'];
              $fac_rate = $row2['fac_rate'];
              $list_total = $row2['list_total'];

              $no =$list_barcode;
              $tempDir = '../qrcode/temp/';
              $email = $no;
              $filename = $email;
              $codeContents = $email;
              QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
              ?>
              <tbody>
                <tr align="center">
                  <td><br><br><?php echo '<img src="../qrcode/temp/'. @$filename.'.png" style="width:140px; height:120px;">'; ?><br><br></td>
                  <td><?php echo $fac_name; ?></td>
                  <td><?php echo $list_start; ?></td>
                  <td><?php echo $list_finish; ?></td>
                  <td>RM <?php echo number_format($fac_rate, 2); ?></td>
                  <td><?php echo $list_qty; ?></td>
                  <td>RM <?php echo number_format($list_total, 2); ?></td>
                </tr>
                <?php
                $price_total += $list_total;
              }?>
              <tr height="30px">
                <td colspan="6" align="right"><b>Total&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                <td align="center"><b>RM <?php echo number_format($price_total, 2); ?></b></td>
              </tr>
            </tbody>
          </table>

          <br><br><center>More information please contact : +606-553 2499.</center>

          <script>
          window.print();
          </script>

        </body>
        </html>
