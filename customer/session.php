<?php

	session_start();

	if (isset($_SESSION['cust_id']))
	{
		$id = $_SESSION['cust_id'];
	}
	else
	{
		header('location:../index.php');
	}

?>
