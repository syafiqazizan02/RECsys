<?php

	include "dbconnection.php";
	include "recovery_password.php";

	if(isset($_POST['recovery']))
	{

		$email = $_POST['email'];

		if($email!='')
		{

			$stmt = $conn->prepare("SELECT *FROM `user_manager` WHERE manager_email=?");
			$stmt->bind_param("s", $email);
			$stmt->execute();

			if($stmt->fetch())
			{
					session_start ();

					recoveryManager();
			}
			else
			{
				$stmt2 = $conn->prepare("SELECT * FROM `user_staff` WHERE staff_email=?");
				$stmt2->bind_param("s", $email);
				$stmt2->execute();

				if($stmt2->fetch())
				{
					session_start ();

					recoveryStaff();
				}
				else
				{
					$stmt3 = $conn->prepare("SELECT * FROM `user_customer` WHERE cust_email=?");
					$stmt3->bind_param("s", $email);
					$stmt3->execute();

					if($stmt3->fetch())
					{
							session_start ();

							recoveryCustomer();
					}
					else
					{
						echo "<script>alert('Your Email is not valid!')</script>";
						echo "<script>window.location.href='recover_form.php';</script>";
					}
				}
			}
		}
		else
		{
			echo "<script>alert('Please enter your Email!')</script>";
			echo "<script>window.location.href='recover_form.php';</script>";
		}

	}

?>
