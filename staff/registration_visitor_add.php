<?php

	include "dbconnection.php";

	if(isset($_POST['submit']))
	{
	 	$cust_name = $_POST['cust_name'];
	 	$cust_ic= $_POST['cust_ic'];
	 	$cust_email= $_POST['cust_email'];
	 	$cust_password = md5('000000');
	 	$cust_contact = $_POST['cust_contact'];
	 	$cust_address = $_POST['cust_address'];
	 	$cust_register = $_POST['cust_register'];

	 	$staff_id = $_POST['staff_id'];

		$stmt = $conn->prepare("INSERT INTO `user_customer` (cust_ic, cust_name, cust_email, cust_password, cust_contact, cust_address, cust_register, staff_id) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssss", $cust_ic, $cust_name, $cust_email, $cust_password, $cust_contact, $cust_address, $cust_register, $staff_id);
		$stmt->execute();

		if($stmt)
		{
			echo "<script> alert('Customer is Successful Register!');
			window.location.href='registration_visitor_panel.php';</script>";
		}
		else
		{
			echo "<script> alert('Customer is Failed Register!');
			window.location.href='registration_visitor_panel.php';</script>";
		}
	}

?>
