<?php

 include "dbconnection.php";

  if(isset($_POST['submit']))
  {
    $staff_id = $_POST['staff_id'];
    $staff_password = md5('000000');

    $stmt = $conn->prepare("UPDATE `user_staff` SET staff_password=? WHERE staff_id=?");
    $stmt->bind_param("ss",  $staff_password, $staff_id);
    $stmt->execute();

    if($stmt){
      echo "<script>alert('Reset Password is Successful!')</script>";
      echo "<script>window.location.href = 'registration_staff_panel.php'</script>";
    }
    else{
      echo "<script>alert('Reset Password is Failed!')</script>";
      echo "<script>window.location.href = 'registration_staff_panel.php'</script>";
    }
  }

?>
