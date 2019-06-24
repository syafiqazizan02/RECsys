<?php

$connect = mysqli_connect("localhost", "root", "", "recreation");

$staff_id = @$_REQUEST['staff_id'];

$myaccount= @$_REQUEST['staff_id'];;

if($staff_id==$myaccount)
{
  $query = "SELECT * FROM `chat_message` WHERE to_user_id= '".$staff_id."' AND notification = 1";
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_array($result);
  $from_user_id = $row["from_user_id"];

  $query2 = "SELECT * FROM `user_staff` WHERE staff_id= '".$from_user_id."' ";
  $result2 = mysqli_query($connect, $query2);
  $row2 = mysqli_fetch_array($result2);
  $staff_name = $row2["staff_full"];

  $query3 = "SELECT * FROM `chat_message` WHERE to_user_id= '".$staff_id."' AND notification = 1";
  $result3 = mysqli_query($connect, $query3);
  $output = '';

  while($row3 = mysqli_fetch_array($result3))
  {
        $output .= '
        <div class="alert alert_default">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p><strong>'.$staff_name.'</strong><br />
        <small><em>'.$row3["chat_message"].'</em></small>
        </p>
        </div>
        ';

        $update_query = "UPDATE `chat_message` SET notification = 0 WHERE notification = 1 AND to_user_id= '".$staff_id."' ";
        mysqli_query($connect, $update_query);

    echo $output;
  }
}else{

  $output = '';

  echo $output;
}

?>
