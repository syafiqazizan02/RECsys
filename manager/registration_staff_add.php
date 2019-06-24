<?php

	include "dbconnection.php";

	if(isset($_POST['submit']))
	{
		$staff_full = $_POST['staff_full'];
		$staff_email= $_POST['staff_email'];
		$staff_password = md5('000000');
		$staff_phone = $_POST['staff_phone'];
		$staff_address = $_POST['staff_address'];
		$staff_register = $_POST['staff_register'];
		$staff_status	= 0;

		$manager_id = $_POST['manager_id'];

		$stmt = $conn->prepare("INSERT INTO `user_staff` (staff_full, staff_email, staff_password, staff_phone, staff_address, staff_register, staff_status, manager_id) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssss", $staff_full, $staff_email, $staff_password, $staff_phone, $staff_address, $staff_register, $staff_status, $manager_id);
		$stmt->execute();

		if($stmt)
		{
			echo "<script> alert('New Staff is Successful Register!');
			window.location.href='registration_staff_panel.php';</script>";
		}
		else
		{
			echo "<script> alert('New Staff is Failed Register!');
			window.location.href='registration_staff_panel.php';</script>";
		}
	}

?>
