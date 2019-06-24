<?php

 include "dbconnection.php";

  if(isset($_POST['submit']))
  {
    $cust_id = $_POST['cust_id'];
    $cust_password = md5('000000');

    $stmt = $conn->prepare("UPDATE `user_customer` SET cust_password=? WHERE cust_id=?");
    $stmt->bind_param("ss",  $cust_password, $cust_id);
    $stmt->execute();

    if($stmt){
      echo "<script>alert('Reset Password is Successful!')</script>";
      echo "<script>window.location.href = 'registration_visitor_panel.php'</script>";
    }
    else{
      echo "<script>alert('Reset Password is Failed!')</script>";
      echo "<script>window.location.href = 'registration_visitor_panel.php'</script>";
    }
  }

?>
