<?php

	include "dbconnection.php";

  if(isset($_GET['staff_id']))
		{
			$staff_id = $_GET['staff_id'];

			$stmt = $conn->prepare("DELETE FROM `user_staff` where staff_id=?");
			$stmt->bind_param("s", $staff_id);
			$stmt->execute();

			echo "<script>alert('Staff Info is Deleted!')</script>";
			echo "<script>window.location.href='registration_staff_panel.php';</script>";
		}

?>
