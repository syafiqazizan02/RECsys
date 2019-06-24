<?php

	include "dbconnection.php";

		if(isset($_POST['submit']))
		{
		   $staff_id = $_POST['staff_id'];
			 $new_password = md5 ($_POST['new_password']);
			 $confirm_password = md5 ($_POST['confirm_password']);

			if($new_password == "" OR $confirm_password == "")
			{
				echo "<script>alert('Please fill in all data!')</script>";
				 echo "<script>window.open('account_profile.php','_self')</script>";
			}
			else if($new_password!=$confirm_password)
			{
				echo "<script>alert('Your password are not same!')</script>";
				 echo "<script>window.open('account_profile.php','_self')</script>";
			}
			else
			{
				$stmt = $conn->prepare("UPDATE `user_staff` SET staff_password = ? WHERE staff_id=?");
				$stmt->bind_param("ss", $new_password, $staff_id);
				$stmt->execute();

					if($stmt)
					{
						echo "<script>alert('Change Password is Successful!')</script>";
						 echo "<script>window.open('../logout.php','_self')</script>";
					}
					else
					{
						echo "<script>alert('Change Password is Failed!')</script>";
							echo "<script>window.open('account_profile.php','_self')</script>";
					}
				}
		}

?>
