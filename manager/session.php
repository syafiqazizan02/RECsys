<?php

	session_start();

	if (isset($_SESSION['manager_id']))
	{
		$id = $_SESSION['manager_id'];
	}
	else
	{
		header('location:../index.php');
	}

?>
