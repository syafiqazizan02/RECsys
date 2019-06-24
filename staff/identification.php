<?php

function staff(){

include "dbconnection.php";

  	$id = $_SESSION['staff_id'];

    $stmt = $conn->prepare("SELECT * FROM `user_staff` WHERE staff_id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

      $staff_full = $row ['staff_full'];

      echo strtoupper($staff_full);
}



function message(){

  include "dbconnection.php";

  $id = $_SESSION['staff_id'];
  $status = 1;

   $stmt2 = $conn->prepare("SELECT COUNT(chat_message_id) AS unseen FROM `chat_message` WHERE to_user_id=? AND status=?");
   $stmt2->bind_param("ss", $id, $status);
   $stmt2->execute();
   $result2 = $stmt2->get_result();
   $row2 = $result2->fetch_assoc();

     $unseen= $row2 ['unseen'];

     if($unseen == 0){
       echo " ";
     }else{
       echo $unseen;
     }
}

 ?>
