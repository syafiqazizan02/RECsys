<?php

	include "dbconnection.php";

	if(isset($_POST['submit']))
	{
		$new_code = $_POST['new_code'];
		$new_model = $_POST['new_model'];
		$new_color = $_POST['new_color'];
		$new_receive = $_POST['new_receive'];
		$new_price = $_POST['new_price'];
		$fac_id = 2;

		$stmt = $conn->prepare("INSERT INTO  `facility_new` (new_code, new_model, new_color, new_receive, new_price, fac_id) VALUES ( ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $new_code, $new_model, $new_color, $new_receive, $new_price, $fac_id);
		$stmt->execute();

		if($stmt){
			$stmt1 = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_id=? ");
			$stmt1->bind_param("s", $fac_id);
			$stmt1->execute();
			$result1 = $stmt1->get_result();
			$row1 = $result1->fetch_assoc();

			$fac_total = $row1['fac_total'];
			$facTotal = ($fac_total + 1);

			$fac_qty = $row1['fac_qty'];
			$facQty = ($fac_qty + 1);

			$fac_limit = $row1['fac_limit'];
			$facLimit = ($fac_limit + 1);

			if($stmt1){
				$stmt2 = $conn->prepare("UPDATE`facility_category` SET  fac_total=?, fac_qty=?, fac_limit=? WHERE fac_id=?");
				$stmt2->bind_param("ssss", $facTotal, $facQty, $facLimit, $fac_id);
				$stmt2->execute();

				echo "<script> alert('Successfully Added New Electric Boat!');
					window.location.href='garage_electric_view_panel.php';</script>";
			}
		}
		else{
			echo "<script> alert('Failed Added 	New Electric Boat!');
				window.location.href='garage_electric_view_panel.php';</script>";
		}
	}

?>
