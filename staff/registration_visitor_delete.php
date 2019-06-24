<?php

	include "dbconnection.php";

  if(isset($_GET['cust_id']))
		{
			$cust_id = $_GET['cust_id'];

			$stmt = $conn->prepare("DELETE FROM `user_customer` where cust_id=?");
			$stmt->bind_param("s", $cust_id);
			$stmt->execute();

			echo "<script>alert('Customer Info is Deleted!')</script>";
			echo "<script>window.location.href='registration_visitor_panel.php';</script>";
		}

?>
