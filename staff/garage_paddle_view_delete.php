<?php

	include "dbconnection.php";

	if(isset($_GET['new_id']))
	{
		$new_id = $_GET['new_id'];
		$fac_id = 1;

		$stmt = $conn->prepare("DELETE FROM `facility_new` where new_id=?");
		$stmt->bind_param("s", $new_id);
		$stmt->execute();

		if($stmt){
			$stmt1 = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_id=? ");
			$stmt1->bind_param("s", $fac_id);
			$stmt1->execute();
			$result1 = $stmt1->get_result();
			$row1 = $result1->fetch_assoc();

			$fac_total = $row1['fac_total'];
			$facTotal = ($fac_total - 1);

			$fac_qty = $row1['fac_qty'];
			$facQty = ($fac_qty - 1);

			$fac_limit = $row1['fac_limit'];
			$facLimit = ($fac_limit - 1);

			if($stmt1){
				$stmt2 = $conn->prepare("UPDATE`facility_category` SET  fac_total=?, fac_qty=?, fac_limit=? WHERE fac_id=?");
				$stmt2->bind_param("ssss", $facTotal, $facQty, $facLimit, $fac_id);
				$stmt2->execute();

				echo "<script> alert('Successfully Deleted Record!');
				window.location.href='garage_paddle_view_panel.php';</script>";
			}
		}
		else{
			echo "<script> alert('Failed Deleted Record!');
			window.location.href='garage_paddle_view_panel.php';</script>";
		}
	}

?>
