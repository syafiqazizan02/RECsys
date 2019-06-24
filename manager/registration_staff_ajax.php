<?php

  include "dbconnection.php";

  if(isset($_POST["id"]))
  {
    foreach($_POST["id"] as $id)
    {
      $sql = "SELECT staff_id, staff_status FROM `user_staff` WHERE staff_id=$id";
      $result=$conn->query($sql);

      while($row = $result->fetch_assoc()){

        if($row['staff_status']==0){
          $query = "UPDATE `user_staff` SET staff_status=1 WHERE staff_id ='".$id."'";
        }
        else if($row['staff_status']==1){
          $query = "UPDATE `user_staff` SET staff_status=0  WHERE staff_id ='".$id."'";
        }
        if($conn->query($query)===TRUE){

        }else{
          echo "<script>alert('".$conn->error."');
          document.location='registration_staff_view.php';
          </script>";
        }
      }
    }
  }else{
    echo "<script>alert('System Error!');
    document.location='registration_staff_view.php';
    </script>";
  }

?>
