<?php 
	require_once 'config.php';

	$data = array();

	// get all quizes
	if(isset($_GET['quiz']) && $_GET['quiz'] == "all")
	{
		$stmt = "SELECT q.*,t.topic_name, t.course_id, c.course_code, c.course_title FROM quiz q, topics t, courses c WHERE q.topic_id = t.topic_id AND q.course = c.id";
		$get_quiz = mysqli_prepare($con, $stmt);
		mysqli_execute($get_quiz);
		$result = mysqli_stmt_get_result($get_quiz);

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($data, $row);
		}
		$res = array("status" => "success", "data" => $data);

		print json_encode($res);
	}

	// create a quiz
	if(isset($_POST['createQuiz']) && $_POST['createQuiz'] =! "")
	{
		
		$course = $_POST['course'];
		$topic =  $_POST['topic'];
		$quiz_id = substr(md5(time()), 10,50);

		$stmt = "INSERT INTO quiz (quiz_id, topic_id, course, date_created, date_updated) VALUES(?,?,?,NOW(),NOW())";
		$create_quiz = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($create_quiz, 'ssi', $quiz_id, $topic, $course);
		if(mysqli_execute($create_quiz))
		{
			$data = array("quiz" => $quiz_id, "topic" => $topic, "course" => $course);
			$res = array("status" => "success", "data" => $data);
		}
		else
		{
			$res =array("status" => mysqli_error($con));
		}
		
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

	// get topics
	if(isset($_GET['course']) && isset($_GET['topic']))
	{
		$course = $_GET['course'];
		$topic = $_GET['topic'];

		if($topic == "all")
		{
			$stmt = "SELECT topic_name, topic_id FROM topics WHERE course_id = $course";
		}
		else
		{
			$stmt = "SELECT topic_name, topic_id FROM topics WHERE course_id = $course AND topic_id = $topic";
		}

		$get_topics = mysqli_prepare($con, $stmt);
		if(mysqli_execute($get_topics))
		{
			$result = mysqli_stmt_get_result($get_topics);

			while($row = mysqli_fetch_assoc($result))
			{
				array_push($data, $row);
			}
			$res = array("status" => "success", "data" => $data);
		}
		print json_encode($res);
	}

	// delete a quiz
	if(isset($_POST['deleteQuiz']) && $_POST['deleteQuiz'] != "")
	{
		$quiz_id = $_POST['deleteQuiz'];

		$stmt = "DELETE FROM quiz WHERE quiz_id=?";

		$delete = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($delete, 's', $quiz_id);
		if(mysqli_execute($delete))
		{
			$res = array("status" => "success");
		}
		else
		{
			$res = array("status" => "error");
		}

		print json_encode($res);
	}