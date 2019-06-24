<?php

include "dbconnection.php";

	if(isset($_GET['start_id']))
	{
		$start_id = $_GET['start_id'];

		$data1 = '';
		$sql1 = "SELECT fac_id FROM `used_list` WHERE start_id='".$start_id."'";
		$result1 = mysqli_query($conn, $sql1);
		$rowcount = mysqli_num_rows($result1);
		$n = ($rowcount-1);


			while ($row1 = mysqli_fetch_array($result1)) {
				$data1 = $data1.$row1['fac_id'];
			}

			for($i=0; $i <= $n; $i++){

				$v = $data1[$i];

				$stmt1 = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_id=? ");
				$stmt1->bind_param("s", $v);
				$stmt1->execute();
				$result1 = $stmt1->get_result();
				$row1 = $result1->fetch_assoc();

				$fac_queue = $row1['fac_queue'];
				$facQueue = ($fac_queue - 1);

				$stmt2 = $conn->prepare("UPDATE `facility_category` SET fac_queue= ? WHERE fac_id =?");
				$stmt2->bind_param("ss", $facQueue, $v);
				$stmt2->execute();
			}

		$stmt3 = $conn->prepare("DELETE FROM `used_list` WHERE start_id=?");
		$stmt3->bind_param("s", $start_id);
		$stmt3->execute();

		$stmt4 = $conn->prepare("DELETE FROM `used_start` WHERE start_id=?");
		$stmt4->bind_param("s", $start_id);
		$stmt4->execute();

		echo "<script>alert('Successfully Cancel Transaction!')</script>";
		echo "<script>window.location.href='transaction_panel_queue_list.php';</script>";
	}else{
		echo "<script>alert('Failed Cancel Transaction!')</script>";
		echo "<script>window.location.href='transaction_panel_queue_list.php';</script>";
	}

?>
