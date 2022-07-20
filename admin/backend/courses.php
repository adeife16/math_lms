<?php
	require_once 'config.php';
	$data = array();

	if(isset($_POST['cCode']))
	{
		$code =  ucwords($_POST['cCode']);
		$title = ucwords($_POST['cTitle']);

		if($code == "" || $title == "")
		{

		}
		else
		{
			$stmt = "INSERT INTO courses(course_code, course_title, date_created, date_updated) VALUES(?, ?, NOW(), NOW())";
			$create_course = mysqli_prepare($con, $stmt);
			mysqli_stmt_bind_param($create_course, 'ss', $code, $title);
			if(mysqli_execute($create_course))
			{
				$res = array("status" => "success");
			}
			else
			{
				$res = array("status" => mysqli_error($con));
			}

			print json_encode($res);
		}
	}


	// get all courses
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$courses = mysqli_query($con, "SELECT * FROM courses");
		if($courses)
		{
			while($row = mysqli_fetch_assoc($courses))
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

	// get a course detail
	if(isset($_POST['getCourse']))
	{
		$cid = $_POST['getCourse'];

		$stmt = "SELECT * FROM courses WHERE id = ?";
		$get_course = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($get_course, 'i', $cid);
		mysqli_execute($get_course);
		$result = mysqli_stmt_get_result($get_course);
		if(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);
			array_push($data, $row);

			$res = array("status" => "success", "data" => $data);
		}
		else
		{
			$res = array("status" => "error", "data" => null);
		}
		print json_encode($res);
	}


	// update a course
	if(isset($_POST['cCode-update']) && $_POST['cCode-update'] != "")
	{
		$code = $_POST['cCode-update'];
		$title = $_POST['cTitle-update'];

		$stmt = "UPDATE courses SET course_code = ?, course_title = ?, date_updated = NOW() WHERE course_code = ?";
		$course_update = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($course_update, 'sss', $code, $title, $code);
		if(mysqli_execute($course_update))
		{
			$res = array("status" => "success");
		}
		else
		{
			$res = array("status" => mysqli_error($con));
		}

		print json_encode($res);
	}

	// delete a course
	if(isset($_POST['deleteCourse']) && $_POST['deleteCourse'] != "")
	{
		$id = $_POST['deleteCourse'];

		$stmt = "DELETE FROM courses WHERE id = ?";
		$delete_course = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($delete_course, 'i', $id);
		if(mysqli_execute($delete_course))
		{
			$res = array("status" => "success");
		}
		else
		{
			$res = array("status" => "error");
		}

		print json_encode($res);
	}
