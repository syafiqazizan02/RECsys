<?php

	include "dbcon.php";

	function label(){

		global $mysqli;

		$data = '';
		$sql = "SELECT DISTINCT cat.fac_name AS fac_name
		FROM `used_rating` AS rate
		JOIN `facility_category` AS cat ON rate.fac_id=cat.fac_id";
		$result = mysqli_query($mysqli, $sql);
		while ($row = mysqli_fetch_array($result)) {
			$data = $data . '"'. $row['fac_name'].'",';
		}
		echo $data = trim($data,",");
	}

	function star1(){

		global $mysqli;

		$data1 = '';
		$sql1 = "SELECT COUNT(rating_id) AS start1 FROM `used_rating` WHERE rating=1 GROUP BY fac_id";
		$result1 = mysqli_query($mysqli, $sql1);
		while ($row1 = mysqli_fetch_array($result1)) {
			$data1 = $data1 . '"'. $row1['start1'].'",';
		}
		echo $data1 = trim($data1,",");
	}

	function star2(){

		global $mysqli;

		$data2 = '';
		$sql2 = "SELECT COUNT(rating_id) AS start2 FROM `used_rating` WHERE rating=2 GROUP BY fac_id";
		$result2 = mysqli_query($mysqli, $sql2);
		while ($row2 = mysqli_fetch_array($result2)) {
			$data2 = $data2 . '"'. $row2['start2'].'",';
		}
		echo $data2 = trim($data2,",");
	}

	function star3(){

		global $mysqli;

		$data3 = '';
		$sql3 = "SELECT COUNT(rating_id) AS start3 FROM `used_rating` WHERE rating=3 GROUP BY fac_id";
		$result3 = mysqli_query($mysqli, $sql3);
		while ($row3 = mysqli_fetch_array($result3)) {
			$data3 = $data3 . '"'. $row3['start3'].'",';
		}
		echo $data3 = trim($data3,",");
	}

	function star4(){

		global $mysqli;

		$data4 = '';
		$sql4 = "SELECT COUNT(rating_id) AS start4 FROM `used_rating` WHERE rating=4 GROUP BY fac_id";
		$result4 = mysqli_query($mysqli, $sql4);
		while ($row4 = mysqli_fetch_array($result4)) {
			$data4 = $data4 . '"'. $row4['start4'].'",';
		}
		echo $data4 = trim($data4,",");
	}

	function star5(){

		global $mysqli;

		$data5 = '';
		$sql5 = "SELECT COUNT(rating_id) AS start5 FROM `used_rating` WHERE rating=5 GROUP BY fac_id";
		$result5 = mysqli_query($mysqli, $sql5);
		while ($row5 = mysqli_fetch_array($result5)) {
			$data5 = $data5 . '"'. $row5['start5'].'",';
		}
		echo $data5 = trim($data5,",");
	}

?>
