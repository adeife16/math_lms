<?php 
	require_once 'config.php';

	$data = array();

	// get all quizes
	if(isset($_GET['exam']) && $_GET['exam'] == "all")
	{
		$stmt = "SELECT e.* c.course_code, c.course_title FROM exam e, courses c WHERE e.course = c.id";
		$get_exam = mysqli_prepare($con, $stmt);
		mysqli_execute($get_exam);
		$result = mysqli_stmt_get_result($get_exam);

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($data, $row);
		}
		$res = array("status" => "success", "data" => $data);

		print json_encode($res);
	}
		// get all courses
	if(isset($_GET['course']) && $_GET['course'] == "all")
	{
		$stmt = "SELECT id,course_code, course_title FROM courses";
		$get_course = mysqli_prepare($con, $stmt);
		if(mysqli_execute($get_course))
		{
			$result = mysqli_stmt_get_result($get_course);

			while($row = mysqli_fetch_assoc($result))
			{
				array_push($data, $row);
			}
			$res = array("status" => "success", "data" => $data);
		}
		print json_encode($res);
	}
		// create a exam
	if(isset($_POST['createExam']) && $_POST['createExam'] =! "")
	{
		
		$course = $_POST['createExam'];
		$time =  $_POST['time'];
		$exam_id = substr(md5(time()), 10,50);

		$stmt = "INSERT INTO exam (exam_id, duration, course, date_created, date_updated) VALUES(?,?,?,NOW(),NOW())";
		$create_exam = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($create_exam, 'sii', $exam_id, $time, $course);
		if(mysqli_execute($create_exam))
		{
			$data = array("exam" => $exam_id, "course" => $course);
			$res = array("status" => "success", "data" => $data);
		}
		else
		{
			$res =array("status" => mysqli_error($con));
		}
		
		print json_encode($res);
		
	}
