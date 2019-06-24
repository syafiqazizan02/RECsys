<?php

	include "dbconnection.php";

		if(isset($_POST['submit']))
		{
		   $cust_id = $_POST['cust_id'];
			 $new_password = md5 ($_POST['new_password']);
			 $confirm_password = md5 ($_POST['confirm_password']);

			if($new_password == "" OR $confirm_password == "")
			{
				echo "<script>alert('Please fill in all data!')</script>";
				 echo "<script>window.open('account_profile_panel.php','_self')</script>";
			}
			else if($new_password!=$confirm_password)
			{
				echo "<script>alert('Your password are not same!')</script>";
				 echo "<script>window.open('account_profile_panel.php','_self')</script>";
			}
			else
			{
				$stmt = $conn->prepare("UPDATE `user_customer` SET cust_password = ? WHERE cust_id=?");
				$stmt->bind_param("ss", $new_password, $cust_id);
				$stmt->execute();

					if($stmt)
					{
						echo "<script>alert('Change Password is Successful!')</script>";
						 echo "<script>window.open('../logout.php','_self')</script>";
					}
					else
					{
						echo "<script>alert('Change Password is Failed!')</script>";
							echo "<script>window.open('account_profile_panel.php','_self')</script>";
					}
				}
		}

?>
