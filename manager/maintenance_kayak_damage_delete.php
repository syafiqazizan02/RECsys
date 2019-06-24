<?php

	include "dbconnection.php";

	if(isset($_GET['dam_id']))
	{
		$dam_id=$_GET['dam_id'];
		$new_id = $_GET ["new_id"];
		$new_damage = 0;

		$stmt = $conn->prepare("SELECT new.fac_id as fac_id, cat.fac_qty as fac_qty, cat.fac_limit as fac_limit FROM `facility_new`AS new JOIN `facility_category` AS cat ON new.fac_id=cat.fac_id AND new_id=?");
		$stmt->bind_param("s", $new_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$fac_id = $row ['fac_id'];
		$fac_qty = $row ['fac_qty'];
		$facQty = ($fac_qty + 1);

		$fac_limit = $row ['fac_limit'];
		$facLimit = ($fac_limit + 1);

		if($row){
			$stmt1 = $conn->prepare("DELETE FROM `damage_kayak` where dam_kyk_id=?");
			$stmt1->bind_param("s", $dam_id);
			$stmt1->execute();

			if($stmt1){
				$stmt2 = $conn->prepare("UPDATE `facility_new` SET new_damage=? WHERE new_id =? ");
				$stmt2->bind_param("ss", $new_damage, $new_id);
				$stmt2->execute();

				$stmt3 = $conn->prepare("UPDATE `facility_category` SET fac_qty =?, fac_limit =? WHERE fac_id = ?");
				$stmt3->bind_param("sss", $facQty, $facLimit, $fac_id);
				$stmt3->execute();

				if($stmt2!=''&& $stmt3!=''){
					echo "<script>alert('Record is Successful Deleted!')
						window.location.href='maintenance_kayak_damage_list.php';</script>";
				}
				else{
					echo "<script> alert('Record is Fail Deleted!');
						window.location.href='maintenance_kayak_damage_list.php';</script>";
				}
			}
		}
	}

?>
