<?php

 function Username(){

   $email = $_POST['email'];

   return $email;
 }

 function generatePassword($length = 6) {

   $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
   $count = mb_strlen($chars);

   for ($i = 0, $result = ''; $i < $length; $i++) {
     $index = rand(0, $count - 1);
     $result .= mb_substr($chars, $index, 1);
   }
    return $result;
 }

  function recoveryManager(){

    include "dbconnection.php";
    require 'php-mailer-master/PHPMailerAutoload.php';

    $email = Username();
    $recovery = generatePassword();

    $stmt4 = $conn->prepare("SELECT * FROM `user_manager` WHERE manager_email=?");
    $stmt4->bind_param("s", $email);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $row4 = $result4->fetch_assoc();
      $manager_full = $row4 ['manager_full'];
      $manager_email = $row4 ['manager_email'];
      $manager_password = $row4 ['manager_password'];

      date_default_timezone_set('Asia/Kuala_Lumpur');
      $datetime = date("d F Y H:i");
      $generate = md5 ($recovery);
         $stmt7 = $conn->prepare("UPDATE `user_manager` SET manager_password = ? WHERE manager_email=?");
         $stmt7->bind_param("ss", $generate, $manager_email);
         $stmt7->execute();

          $mail = new PHPMailer;
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'skpmlibrary@gmail.com';
          $mail->Password = 'skpm2018';
          $mail->SMTPSecure = false;
          $mail->Port = 587;
          $mail->setFrom('skpmlibrary@gmail.com', 'Pusat Rekreasi Air');
          $mail->addAddress($manager_email);
          $mail->isHTML(true);
          $mail->Subject = 'Recovery Password';
          $mail->Body    = '<p><h3>Congratulation!</h3><b>Successful recovery password on</b> '.$datetime.'</p>
                            <p>Hello '.$manager_full.'<br>
                            Your current password is <b>'.$recovery.'</b><br>
                            <p>More information please contact : +606-553 2499.</p>';
          $mail->AltBody = '<p><h3>Congratulation!</h3><b>Successful recovery password on</b> '.$datetime.'</p><
                            <p>Hello '.$manager_full.'<br>
                            Your new password is <b>'.$recovery.'</b><br>
                            <p>More information please contact : +606-553 2499.</p>';
            $mail->send();

               echo "<script>alert('Successful recovery password. Please check your email!')
                       window.location.href='logout.php';</script>";
  }

  function recoveryStaff(){

    include "dbconnection.php";
    require 'php-mailer-master/PHPMailerAutoload.php';

    $email = Username();
    $recovery = generatePassword();

    $stmt5 = $conn->prepare("SELECT * FROM `user_staff` WHERE staff_email=?");
    $stmt5->bind_param("s", $email);
    $stmt5->execute();
    $result5 = $stmt5->get_result();
    $row5 = $result5->fetch_assoc();
        $staff_full = $row5 ['staff_full'];
        $staff_email = $row5 ['staff_email'];
        $staff_password = $row5 ['staff_password'];

       date_default_timezone_set('Asia/Kuala_Lumpur');
       $datetime = date("d F Y H:i");
       $generate = md5 ($recovery);
         $stmt8 = $conn->prepare("UPDATE `user_staff` SET staff_password = ? WHERE staff_email=?");
         $stmt8->bind_param("ss", $generate, $staff_email);
         $stmt8->execute();

           $mail = new PHPMailer;
           $mail->isSMTP();
           $mail->Host = 'smtp.gmail.com';
           $mail->SMTPAuth = true;
           $mail->Username = 'skpmlibrary@gmail.com';
           $mail->Password = 'skpm2018';
           $mail->SMTPSecure = false;
           $mail->Port = 587;
           $mail->setFrom('skpmlibrary@gmail.com', 'Pusat Rekreasi Air');
           $mail->addAddress($staff_email);
           $mail->isHTML(true);
           $mail->Subject = 'Recovery Password';
           $mail->Body    = '<p><h3>Congratulation!</h3><b>Successful recovery password on</b> '.$datetime.'</p>
                            <p>Hello '.$staff_full.'<br>
                             Your current password is <b>'.$recovery.'</b><br>
                             <p>More information please contact : +606-553 2499.</p>';
           $mail->AltBody = '<p><h3>Congratulation!</h3><b>Successful recovery password on</b> '.$datetime.'</p><
                             <p>Hello '.$staff_full.'<br>
                             Your new password is <b>'.$recovery.'</b><br>
                             <p>More information please contact : +606-553 2499.</p>';
             $mail->send();

                echo "<script>alert('Successful recovery password. Please check your email!')
                        window.location.href='logout.php';</script>";
  }

  function recoveryCustomer(){

    include "dbconnection.php";
    require 'php-mailer-master/PHPMailerAutoload.php';

    $email = Username();
    $recovery = generatePassword();

    $stmt6 = $conn->prepare("SELECT * FROM `user_customer` WHERE cust_email=?");
    $stmt6->bind_param("s", $email);
    $stmt6->execute();
    $result6 = $stmt6->get_result();
    $row6 = $result6->fetch_assoc();
      $cust_name = $row6 ['cust_name'];
      $cust_email = $row6 ['cust_email'];
      $cust_password = $row6 ['cust_password'];

      date_default_timezone_set('Asia/Kuala_Lumpur');
      $datetime = date("d F Y H:i");
      $generate = md5 ($recovery);
        $stmt9 = $conn->prepare("UPDATE `user_customer` SET cust_password = ? WHERE cust_email=?");
        $stmt9->bind_param("ss", $generate, $cust_email);
        $stmt9->execute();

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
          $mail->Subject = 'Recovery Password';
          $mail->Body    = '<p><h3>Congratulation!</h3><b>Successful recovery password on</b> '.$datetime.'</p>
                            <p>Hello '.$cust_name.'<br>
                            Your current password is <b>'.$recovery.'</b><br>
                            <p>More information please contact : +606-553 2499.</p>';
          $mail->AltBody = '<p><h3>Congratulation!</h3><b>Successful recovery password on</b> '.$datetime.'</p>
                            <p>Hello '.$cust_name.'<br>
                            Your new password is <b>'.$recovery.'</b><br>
                            <p>More information please contact : +606-553 2499.</p>';
            $mail->send();

               echo "<script>alert('Successful recovery password. Please check your email!')
                       window.location.href='logout.php';</script>";
  }


?>
