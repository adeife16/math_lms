<?php
	require_once 'config.php';
	$data = array();

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$get_countries = mysqli_query($con, "SELECT id, name FROM countries");
		while($row = mysqli_fetch_assoc($get_countries))
		{
			array_push($data, $row);
		}
		$res = array("status" => "success", "data" => $data);

		print json_encode($res);
	}