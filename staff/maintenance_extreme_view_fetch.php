<?php

  include "dbconnection.php";

    if(isset($_POST["id"]))
    {
      foreach($_POST["id"] as $id)
      {
        $sql = "SELECT fac_id, fac_status FROM `facility_category` WHERE fac_id=$id";
        $result=$conn->query($sql);

        while($row = $result->fetch_assoc()){

          date_default_timezone_set('Asia/Kuala_Lumpur');
          $fac_un =  date("Y-m-d H:i");

          $fac_av = "0000-00-00";

          if($row['fac_status']==0){
            $query = "UPDATE`facility_category` SET fac_status=1, fac_unav ='".$fac_un."' WHERE fac_id ='".$id."'";

          }
          else if($row['fac_status']==1){
            $query = "UPDATE `facility_category` SET fac_status=0, fac_unav ='".$fac_av."'  WHERE fac_id ='".$id."'";

          }
          if($conn->query($query)===TRUE){

          }else{
            echo "<script>alert('".$conn->error."');
            document.location='maintenance_extreme_view_panel.php';
            </script>";
          }
        }
      }
    }else{
      echo "<script>alert('System Error!');
      document.location='maintenance_extreme_view_panel.php';
      </script>";
    }

?>
