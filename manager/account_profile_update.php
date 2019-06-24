<?php
  include "dbconnection.php";

  if(isset($_POST['submit']))
  {
    $manager_id = $_POST['manager_id'];
    $manager_full= $_POST ["manager_full"];
    $manager_phone = $_POST ["manager_phone"];
    $manager_address = $_POST ["manager_address"];

    $stmt = $conn->prepare("UPDATE `user_manager` SET manager_full=?, manager_phone=?, manager_address=? WHERE manager_id=?");
    $stmt->bind_param("ssss", $manager_full, $manager_phone, $manager_address, $manager_id);
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
