<?php

function manager(){

include "dbconnection.php";

  	$id = $_SESSION['manager_id'];

    $stmt = $conn->prepare("SELECT * FROM `user_manager` WHERE manager_id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

      $manager_full = $row ['manager_full'];

      echo strtoupper($manager_full);
}

 ?>
