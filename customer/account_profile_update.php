<?php
  include "dbconnection.php";

  if(isset($_POST['submit']))
  {
    $cust_id = $_POST['cust_id'];
    $cust_name= $_POST ["cust_name"];
    $cust_email = $_POST ["cust_email"];
    $cust_contact = $_POST ["cust_contact"];
    $cust_gender = $_POST ["cust_gender"];
	$cust_age = $_POST ["cust_age"];
    $cust_address = $_POST ["cust_address"];

    $stmt = $conn->prepare("UPDATE `user_customer` SET cust_name=?, cust_email=?, cust_contact=?, cust_gender=?, cust_age=?, cust_address=? WHERE cust_id=?");
    $stmt->bind_param("sssssss", $cust_name, $cust_email, $cust_contact, $cust_gender, $cust_age, $cust_address, $cust_id);
    $stmt->execute();

    if($stmt){
      echo "<script>alert('Record Updated Successfully!')</script>";
      echo "<script>window.location.href = 'account_profile_panel.php'</script>";
    }
    else{
      echo "<script>alert('Record Updated Failed!')</script>";
      echo "<script>window.location.href = 'account_profile_panel.php'</script>";
    }
  }
?>
