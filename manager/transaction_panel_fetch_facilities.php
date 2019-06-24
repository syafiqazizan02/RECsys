<?php

  include ('dbconnection.php');
  include ('../php-mailer-master/PHPMailerAutoload.php');

		//Getting Visitor ID
		$cust_id = $_POST['hidden_cust_id'];

		//Getting Start Date
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$start_date = date("Y-m-d H:i:s");

    //Insert Into Table `used_start`
    $stmt = $conn->prepare("INSERT INTO `used_start` (start_date, cust_id) VALUES (?, ?)");
    $stmt->bind_param("ss", $start_date, $cust_id);
    $stmt->execute();

    //Select From Table `used_start`
    $stmt1 = $conn->prepare("SELECT * FROM `used_start` ORDER BY start_id DESC");
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $row1 = $result1->fetch_assoc();
      $start_id= $row1 ['start_id'];
      $start_date= date_format(date_create($row1['$start_date']), 'd/m/Y');

    //Update Into Table `used_start`
    $random = (rand(10,1000));
    $start_random = 'Q'.$random.''.$start_id;
    $stmt11 = $conn->prepare("UPDATE `used_start` SET start_random= ? WHERE start_id =?");
    $stmt11->bind_param("ss", $start_random, $start_id);
    $stmt11->execute();

    //Count Hidden ID
		 $n =  $_POST['hidcount'];

    //Insert Into Table `used_list`
    for($i=1; $i <= $n; $i++)
    {
        //Getting Facilities ID
        $fac_id = $_POST['hidden_fac_id'.$i];

        //Getting Facilities Quntity
        $list_qty = $_POST['hidden_list_qty'.$i];

        //Getting Facilities Rate
        $list_rate = $_POST['hidden_list_rate'.$i];

        $list_total = ($list_qty * $list_rate);

        //Insert Into Table `used_list`
        $stmt2 = $conn->prepare("INSERT INTO `used_list` (list_qty, list_total, fac_id, start_id) VALUES (?, ?, ?, ?)");
        $stmt2->bind_param("ssss", $list_qty, $list_total, $fac_id, $start_id);
        $stmt2->execute();

        //Select From Table  `used_list`
        $stmt3 = $conn->prepare("SELECT * FROM `used_list` ORDER BY list_id DESC");
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        $row3 = $result3->fetch_assoc();
           $list_id = $row3 ['list_id'];
           $random = mt_rand();
           $list_barcode = $random.''.$list_id;

        //Update Into Table  `used_list`
        $stmt4 = $conn->prepare("UPDATE `used_list` SET list_barcode= ? WHERE list_id =?");
        $stmt4->bind_param("ss", $list_barcode, $list_id);
        $stmt4->execute();

        //Select From Table `facility_category`
        $stmt5 = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_id =?");
        $stmt5->bind_param("s", $fac_id);
        $stmt5->execute();
        $result5 = $stmt5->get_result();
        $row5 = $result5->fetch_assoc();
           $fac_queue= $row5 ['fac_queue'];

        $sumlimit = ($fac_queue+1);

        //Update Into Table  `facility_category`
        $stmt6 = $conn->prepare("UPDATE `facility_category` SET fac_queue = ? WHERE fac_id =?");
        $stmt6->bind_param("ss", $sumlimit, $fac_id);
        $stmt6->execute();

        //Select Customer Info
        $stmt7 = $conn->prepare("SELECT * FROM `user_customer` WHERE cust_id =?");
        $stmt7->bind_param("s", $cust_id);
        $stmt7->execute();
        $result7 = $stmt7->get_result();
        $row7 = $result7->fetch_assoc();
           $cust_name= $row7 ['cust_name'];
           $cust_email= $row7 ['cust_email'];

        //PHPMailerAutoload to Gmail
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
     		 $mail->Subject = 'Reserved Facilities';
     		 $mail->Body    = '<p><h3>Congratulation!</h3><b>Your transaction is Successful. Queue ID '.$start_random.'</b></p>
     											 <p>Customer Name: '.$cust_name.'<br>
     												Reserve  Date: '.$start_date.'<br>
     											 <p>More information please contact : +606-553 2499.</p>';
     		 $mail->AltBody = '<p><h3>Congratulation!</h3><b>Your transaction is Successful. Queue ID'.$start_random.'</b></p>
     											 <p>Customer Name: '.$cust_name.'<br>
     												Reserve  Date: '.$start_date.'<br>
     											 <p>More information please contact : +606-553 2499.</p>';
     		 $mail->send();
        }

?>
