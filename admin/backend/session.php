<?php

	require_once 'config.php';

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		if(isset($_SESSION['email']) && $_SESSION['email'] != "")
		{
			$email = $_SESSION['email'];
			$fname = $_SESSION['fname'];
			$role =  $_SESSION['role'];

			$data = array("email" => $email, "fname" => $fname, "role" => $role);

			$res = array("status" => "success", "data" => $data);
		}
		else
		{
			$res = array("status" => "error");
		}

		print json_encode($res);
	}