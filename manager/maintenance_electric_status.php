<?php

	include "dbconnection.php";

		if(isset($_POST['repair']))
		{
			$rep_date = $_POST['rep_date'];
			$dam_id = $_POST['dam_id'];
			$rep_status = 1;

			$stmt = $conn->prepare("UPDATE`damage_electric`SET rep_elc_status =?, rep_elc_date =? WHERE dam_elc_id =?");
			$stmt->bind_param("sss", $rep_status, $rep_date, $dam_id);
			$stmt->execute();

				if($stmt){
					echo "<script> alert('Electric Boat is Going Repair!');
					window.location.href='maintenance_electric_damage_list.php';</script>";
				}
				else{
					echo "<script> alert('Electric Boat is Failed Repair!');
					window.location.href='maintenance_electric_damage_list.php';</script>";
				}
		}

		if(isset($_POST['cancel']))
		{
			$rep_date = 0;
			$dam_id = $_POST['dam_id'];
			$rep_status = 0;

			$stmt = $conn->prepare("UPDATE`damage_electric`SET rep_elc_status =?, rep_elc_date =? WHERE dam_elc_id =?");
			$stmt->bind_param("sss", $rep_status, $rep_date, $dam_id);
			$stmt->execute();

				if($stmt){
					echo "<script> alert('Successfully Deleted Record!');
						window.location.href='maintenance_electric_repair_list.php';</script>";
				}
				else{
					echo "<script> alert('Failed Deleted Record!');
						window.location.href='maintenance_electric_repair_list.php';</script>";
				}
		}

?>
