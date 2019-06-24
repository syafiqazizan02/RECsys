<?php

	include "dbconnection.php";

		if(isset($_POST['repair']))
		{
			$rep_date = $_POST['rep_date'];
			$dam_id = $_POST['dam_id'];
			$rep_status = 1;

			$stmt = $conn->prepare("UPDATE`damage_kayak`SET rep_kyk_status =?, rep_kyk_date =? WHERE dam_kyk_id =?");
			$stmt->bind_param("sss", $rep_status, $rep_date, $dam_id);
			$stmt->execute();

				if($stmt){
					echo "<script> alert('Kayak is Going Repair!');
					window.location.href='maintenance_kayak_damage_list.php';</script>";
				}
				else{
					echo "<script> alert('Kayak is Failed Repair!');
					window.location.href='maintenance_kayak_damage_list.php';</script>";
				}
		}

		if(isset($_POST['cancel']))
		{
			$rep_date = 0;
			$dam_id = $_POST['dam_id'];
			$rep_status = 0;

			$stmt = $conn->prepare("UPDATE`damage_kayak`SET rep_kyk_status =?, rep_kyk_date =? WHERE dam_kyk_id =?");
			$stmt->bind_param("sss", $rep_status, $rep_date, $dam_id);
			$stmt->execute();

				if($stmt){
					echo "<script> alert('Successfully Deleted Record!');
						window.location.href='maintenance_kayak_repair_list.php';</script>";
				}
				else{
					echo "<script> alert('Failed Deleted Record!');
						window.location.href='maintenance_kayak_repair_list.php';</script>";
				}
		}

?>
