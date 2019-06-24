<?php
  include "dbconnection.php";

  if(isset($_POST['submit']))
  {
    $staff_id = $_POST['staff_id'];
    $staff_full= $_POST ["staff_full"];
    $staff_phone = $_POST ["staff_phone"];
    $staff_address = $_POST ["staff_address"];

    $stmt = $conn->prepare("UPDATE `user_staff` SET staff_full=?, staff_phone=?, staff_address=? WHERE staff_id=?");
    $stmt->bind_param("ssss", $staff_full, $staff_phone, $staff_address, $staff_id);
    $stmt->execute();

    if($stmt){
      echo "<script>alert('Record Updated Successfully!')</script>";
      echo "<script>window.location.href = 'account_profile.php'</script>";
    }
    else{
      echo "<script>alert('Record Updated Failed!')</script>";
      echo "<script>window.location.href = 'account_profile.php'</script>";
    }
  }
?>
