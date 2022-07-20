<?php
	require_once 'config.php';
	require_once 'functions.php';

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		// get number of students, courses, toopics and instructors

		// number of students
		$student = mysqli_query($con, "SELECT id FROM student");
		$student = mysqli_num_rows($student);

		// number of courses
		$course = mysqli_query($con, "SELECT id FROM courses");
		$course = mysqli_num_rows($course);

		// number of topics
		$topic = mysqli_query($con, "SELECT id FROM topics");
		$topic = mysqli_num_rows($topic);

		// instructors
		$instructor = mysqli_query($con, "SELECT id FROM admin WHERE role = 'instructor'");
		$instructor = mysqli_num_rows($instructor);

		$data = array("student" => $student, "course" => $course, "topic" => $topic, "instructor" => $instructor);

		// get user activity for the last seven days
		$dateArr = array();
		$current_date = strtotime(date('Y-m-d'));
		for($i = 0; $i <= 7; $i++)
		{	
			$new_date = strtotime("-".$i."days", $current_date);
			$new_date = date('Y-m-d', $new_date);
			array_push($dateArr, $new_date);
		}
		
		$dateArr = array_reverse($dateArr);
		$dayArr = array();

		$activityArr = array();
		foreach ($dateArr as $day) {
			// $day = strval($day);
			$activity = mysqli_query($con, "SELECT * FROM logs WHERE user_type = 'student' AND date_created = '$day'");
			array_push($dayArr, mysqli_num_rows($activity));
			
			while($row = mysqli_fetch_assoc($activity))
			{
				array_push($activityArr, $row);
			}	
		}	

		$res = array("status" => "success", "data" => $data, "date" => $dateArr, "activitycount" => $dayArr, "activity" => $activityArr);

		print json_encode($res);
	}