<?php

	require_once 'config.php';

	if(!isset($_SESSION['matric']))
	{
		session_unset();
		session_destroy();
		$res = array("status", "error", "data" => null);
	}
	else
	{
		$matric =$_SESSION['matric'];
		$fname = $_SESSION['fname'];
		$lname = $_SESSION['lname'];
		$picture = $_SESSION['pic'];

		$data = array("matric" => $matric, "fname" => $fname, "lname" => $lname, "picture" => $picture);

		$res = array("status", "success", "data" => $data);
	}

	print json_encode($res);

