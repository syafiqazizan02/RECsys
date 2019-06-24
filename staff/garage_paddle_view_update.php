<?php

	include "dbconnection.php";

		if(isset($_POST['submit']))
		{
		  $new_code = $_POST['new_code'];
		  $new_model = $_POST['new_model'];
		  $new_color = $_POST['new_color'];
		  $new_receive = $_POST['new_receive'];
		  $new_price = $_POST['new_price'];
      $new_id  = $_POST['new_id'];

      $stmt = $conn->prepare("UPDATE `facility_new` SET  new_code=?, new_model=?, new_color=?, new_receive=?, new_price=? where new_id=?");
		  $stmt->bind_param("ssssss", $new_code, $new_model, $new_color, $new_receive, $new_price, $new_id);
			$stmt->execute();

				if($stmt){
					echo "<script> alert('Successfully Updated Record!');
							window.location.href='garage_paddle_view_panel.php';</script>";
				}
				else{
					echo "<script> alert('Failed Updated Record!');
								window.location.href='garage_paddle_view_panel.php';</script>";
				}
		}

?>
