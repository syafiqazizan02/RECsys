<?php

  include "dbconnection.php";

  $staff_id = @$_REQUEST['staff_id'];
  $status = 1;

  $stmt2 = $conn->prepare("SELECT COUNT(chat_message_id) AS unseen FROM `chat_message` WHERE to_user_id=? AND status=?");
  $stmt2->bind_param("ss", $staff_id, $status);
  $stmt2->execute();
  $result2 = $stmt2->get_result();
  $row2 = $result2->fetch_assoc();

  $output= $row2 ['unseen'];

    if($output == 0){
      echo " ";
    }else{
      echo $output;
    }

?>
