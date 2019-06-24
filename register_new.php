<?php

	include "dbconnection.php";

	if(isset($_POST['register']))
	{
		$cust_name = $_POST['cust_name'];
		$cust_ic= $_POST['cust_ic'];
		$cust_contact = $_POST['cust_contact'];
		$cust_email= $_POST['cust_email'];
		$current_password = md5 ($_POST['current_password']);
		$confirm_password = md5 ($_POST['confirm_password']);


		if($current_password == "" OR $confirm_password == "")
		{
			echo "<script>alert('Please fill in all data!')</script>";
			echo "<script>window.open('register_form.php','_self')</script>";
		}
		else if($current_password!=$confirm_password)
		{
			echo "<script>alert('Your password are not same!')</script>";
			echo "<script>window.open('register_form.php','_self')</script>";
		}
		else
		{
			date_default_timezone_set('Asia/Kuala_Lumpur');
			$cust_register =  date("Y-m-d H:i");

			$stmt = $conn->prepare("INSERT INTO `user_customer` (cust_name,  cust_ic, cust_email, cust_password, cust_contact,cust_register) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssss", $cust_name, $cust_ic, $cust_email, $current_password, $cust_contact, $cust_register);
			$stmt->execute();

			if($stmt)
			{
				echo "<script> alert('Customer is Successful Register!');
				window.location.href='index.php';</script>";
			}
			else
			{
				echo "<script> alert('Customer is Failed Register!');
				window.location.href='register_form.php';</script>";
			}
		}
	}

?>
