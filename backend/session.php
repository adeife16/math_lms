<?php
	require_once 'config.php';


	if($_SERVER['REQUEST_METHOD'] == "GET")
	{

		if(isset($_SESSION['matric']) && isset($_SESSION['fname']) && isset($_SESSION['lname']) && isset($_SESSION['pic']))
		{
			$matric = $_SESSION['matric'];
			$fname = $_SESSION['fname'];
			$lname = $_SESSION['lname'];
			$picture = $_SESSION['pic'];

			$data = array("matric" => $matric, "fname" => $fname, "lname" => $lname, "picture" => $picture);
			$res = array("status" => "success", "data" => $data);
		}
		else
		{
			$res = array("status" => "error", "data" => null);
		}

		print json_encode($res);
	}