<?php
	require_once 'config.php';

	$session_matric = $_SESSION['matric'];
	$data = array();

	// get all courses

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$get_course = mysqli_query($con, "SELECT * FROM courses");
		if(mysqli_num_rows($get_course) > 0)
		{
			while ($row = mysqli_fetch_assoc($get_course))
			{
				array_push($data, $row);
			}
			$res = array("status" => "success", "data" => $data);
		}
		else
		{
			$res = array("status" => "success", "data" => "empty");
		}

		print json_encode($res);
	}


	// enroll for a course
	if(isset($_POST['enroll']) && $_POST['enroll'] != "")
	{
		$course_id = $_POST['enroll'];

		// check if user has already enrolled
		$check = mysqli_query($con, "SELECT * FROM course_enroll WHERE matric = '$session_matric' AND course_id = '$course_id'");
		if(mysqli_num_rows($check) > 0) // if user has enrolled
		{
			$res = array("status" => "already enrolled");

			// print json_encode($res);
		}
		// if user hasn't enrolled
		else
		{

			$stmt = "SELECT course_code FROM courses WHERE id = ?";
			$get_course = mysqli_prepare($con, $stmt);
			mysqli_stmt_bind_param($get_course, 'i', $course_id);
			mysqli_execute($get_course);
			$result = mysqli_stmt_get_result($get_course);
			// if course exists get topics
			if(mysqli_num_rows($result) == 1)
			{
				$stmt = "SELECT * FROM topics WHERE course_id = ?";
				$get_topics = mysqli_prepare($con, $stmt);
				mysqli_stmt_bind_param($get_topics, 'i', $course_id);
				mysqli_execute($get_topics);
				$result = mysqli_stmt_get_result($get_topics);

				// if topics exists get the number of topics
				if(mysqli_num_rows($result) > 0)
				{
					$total_topics = mysqli_num_rows($result);

					$stmt = "INSERT INTO course_enroll(matric, course_id, total_topics) VALUES(?, ?, ?)";
					$enroll = mysqli_prepare($con, $stmt);
					mysqli_stmt_bind_param($enroll, 'ssi', $session_matric, $course_id, $total_topics);
					if(mysqli_execute($enroll))
					{
						$res = array("status" => "success");
					}
					else
					{
						$res = array("status" => "error");
					}
				}
				else
				{
						$res = array("status" => "error");
				}

			}
		}
		print json_encode($res);
	}

	// unroll from a course
	if(isset($_POST['unEnroll']) && $_POST['unEnroll'] != "")
	{
		$course_id = $_POST['unEnroll'];

		// check if user has already enrolled
		$check = mysqli_query($con, "SELECT * FROM course_enroll WHERE matric = '$session_matric' AND course_id = '$course_id'");
		if(mysqli_num_rows($check) > 0) // if user has enrolled
		{

			$stmt = "DELETE FROM course_enroll WHERE matric = '$session_matric' AND course_id = ?";
			$delete = mysqli_prepare($con, $stmt);
			mysqli_stmt_bind_param($delete, 'i', $course_id);
			if(mysqli_execute($delete))
			{
				$res = array("status" => "success");
			}
			else
			{

			}
		}
		else
		{
			$res = array("status" => "not enrolled");
		}

		print json_encode($res);
	}