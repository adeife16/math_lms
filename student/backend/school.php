<?php
	require_once 'config.php';

	$data = array();

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$get_faculties = mysqli_query($con, "SELECT id, name FROM faculty");
		while($row = mysqli_fetch_assoc($get_faculties))
		{
			array_push($data, $row);
		}

		$res = array("status" => "success", "data" => $data);

		print json_encode($res);
	}



	if(isset($_POST['fId']) && $_POST['fId'] != "")
	{
		$fId = $_POST['fId'];

		$stmt = "SELECT id, dept_name FROM department WHERE faculty = ?";
		$get_dept = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($get_dept, 'i', $fId);
		mysqli_execute($get_dept);
		$result = mysqli_stmt_get_result($get_dept);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				array_push($data, $row);
			}
			$res = array("status" => "success", "data" => $data);
		}
		else
		{

		}
		print json_encode($res);
	}