<?php

	session_start();

	if (isset($_SESSION['staff_id']))
	{
		$id = $_SESSION['staff_id'];
	}
	else
	{
		header('location:../index.php');
	}

?>
