<?php

include ('dbconnection.php');
include ('../php-mailer-master/PHPMailerAutoload.php');

date_default_timezone_set("Asia/Kuala_Lumpur");
$time = date("H:i:s");

if(isset($_POST["list_barcode"]))
{
  if($_POST["post_id"] != '')
  {

  }
  else
  {
    $sql = "UPDATE `used_list` SET list_status = 1,  list_start = NOW() WHERE list_barcode = '".$_POST["list_barcode"]."'";
    $result = mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM `used_list` WHERE list_barcode = '".$_POST["list_barcode"]."'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $list_qty = $row1["list_qty"];
    $fac_id = $row1["fac_id"];
    $start_id = $row1["start_id"];

    $sql2 = "SELECT * FROM `facility_category` WHERE fac_id = '".$fac_id."'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $fac_name = $row2["fac_name"];
    $fac_limit = $row2["fac_limit"];
    $fac_queue = $row2["fac_queue"];
    $fac_use = $row2["fac_use"];

    $sub1 = ($fac_limit - $list_qty);
    $sub2 = ($fac_queue - $list_qty);
    $sub3 = ($fac_use + $list_qty);

    $sql3 = "UPDATE `facility_category` SET fac_limit ='".$sub1."', fac_queue ='".$sub2."', fac_use ='".$sub3."' WHERE fac_id = '".$fac_id."' ";
    $resul3 = mysqli_query($conn, $sql3);

    $sql4 = "SELECT cust.cust_name as cust_name, cust.cust_email as cust_email
    FROM `user_customer` AS cust
    JOIN `used_start` AS start ON start.cust_id=cust.cust_id
    AND start.start_id = '".$start_id."'";
    $result4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $cust_name = $row4["cust_name"];
    $cust_email = $row4["cust_email"];

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'skpmlibrary@gmail.com';
    $mail->Password = 'skpm2018';
    $mail->SMTPSecure = false;
    $mail->Port = 587;
    $mail->setFrom('skpmlibrary@gmail.com', 'Pusat Rekreasi Air');
    $mail->addAddress($cust_email);
    $mail->isHTML(true);
    $mail->Subject = 'Start Use Facilities';
    $mail->Body    = '<p><h3>Congratulation!</h3><b>Your transaction is Successful. Faclities '.$fac_name.'</b></p>
                      <p>Faclities Code: '.$_POST["list_barcode"].'<br>
                       Customer Name: '.$cust_name.'<br>
                       Start Time: '.$time.'<br>
                      <p>More information please contact : +606-553 2499.</p>';
    $mail->AltBody = '<p><h3>Congratulation!</h3><b>Your transaction is Successful. Faclities'.$fac_name.'</b></p>
                      <p>Faclities Code: '.$_POST["list_barcode"].'<br>
                       Customer Name: '.$cust_name.'<br>
                       Start Time: '.$time.'<br>
                      <p>More information please contact : +606-553 2499.</p>';
    $mail->send();

  }
}

?>
