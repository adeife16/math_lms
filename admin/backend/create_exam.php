<?php
	require_once 'config.php';
	$data = array();
	// get quiz questions
	if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['quiz']))
	{
		$exam = $_GET['quiz'];
		$topic = $_GET['topic'];

		
		$stmt = "SELECT * FROM single WHERE quiz_id=? AND topic_id=?";
		$stmt2 = "SELECT * FROM multiple WHERE quiz_id=? AND topic_id=?";
		$stmt3 = "SELECT * FROM tf WHERE quiz_id=? AND topic_id=?";
		$get_single = mysqli_prepare($con, $stmt);
		if($get_single)
		{
			mysqli_stmt_bind_param($get_single, 'ss', $exam, $topic);
			mysqli_execute($get_single);
			$result = mysqli_stmt_get_result($get_single);
			
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						array_push($data, $row);
					}

				}
			}
		}

		$get_multiple = mysqli_prepare($con, $stmt2);
		if($get_multiple)
		{
			mysqli_stmt_bind_param($get_multiple, 'ss', $exam, $topic);
			mysqli_execute($get_multiple);
			$result = mysqli_stmt_get_result($get_multiple);
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$answer = $row['answer'];
						explode(",", $answer);
						$row['answer'] = $answer;
						array_push($data, $row);
					}

				}
			}
		}
		$get_tf = mysqli_prepare($con, $stmt3);
		if($get_tf)
		{
			mysqli_stmt_bind_param($get_tf, 'ss', $exam, $topic);
			mysqli_execute($get_tf);
			$result = mysqli_stmt_get_result($get_tf);
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						array_push($data, $row);
					}

				}
			}
		}
		if(count($data) == 0)
		{
			$res = array("status" => "error");
		}
		else
		{
			shuffle($data);
			$res = array("status" => "success", "data" => $data);
		}

		print json_encode($res);
	}

// Save Quiz

	if(isset($_POST['saveExam']) && $_POST['saveExam'] != "")
	{
		$exam = $_POST['saveExam'];
		$type = $exam['type'];
		$exam_id = $exam['exam_id'];
		$course_id = $exam['course'];
		$topic_id = substr(md5(time()), 10,50);

		if($type == "single")
		{
			$question_id = $exam['question_id'];
			$question = $exam['question'];
			$option1 = $exam['option1'];
			$option2 = $exam['option2'];
			$option3 = $exam['option3'];
			$option4 = $exam['option4'];
			$answer = $exam['answer'];
			$type = $exam['type'];
			$check = mysqli_query($con, "SELECT * FROM single WHERE question_id = '$question_id' AND quiz_id = '$exam_id' AND course_id = '$course_id'");
			// print(mysqli_num_rows($check));
			if(mysqli_num_rows($check) == 0)
			{
				$stmt = "INSERT INTO single(question_id, type, question, option1, option2, option3, option4, answer, quiz_id, topic_id, course_id, date_created) VALUES(?,?,?,?,?,?,?,?,?,?,?, NOW())";
				$create = mysqli_prepare($con, $stmt);
				mysqli_stmt_bind_param($create, 'ssssssssssi', $question_id, $type, $question, $option1, $option2, $option3, $option4, $answer, $exam_id, $topic_id, $course_id);
				if(mysqli_execute($create))
				{
					$res = array("status" => "success");
				}
				else
				{
					$res = array("status" => mysqli_error($con));
				}
			}
			else if(mysqli_num_rows($check) > 0)
			{
				$stmt = "UPDATE single SET question = ?, option1 = ?, option2 = ?, option3 = ?, option4 = ?, answer = ?, date_created = NOW()  WHERE question_id = ? AND quiz_id = ?";
				$update = mysqli_prepare($con, $stmt);
				mysqli_stmt_bind_param($update, 'ssssssss', $question, $option1, $option2, $option3, $option4, $answer, $question_id, $exam_id);
				if(mysqli_execute($update))
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

			}
			print json_encode($res);
		}
		elseif ($type == "multiple")
		{
			$question_id = $exam['question_id'];
			$question = $exam['question'];
			$option1 = $exam['option1'];
			$option2 = $exam['option2'];
			$option3 = $exam['option3'];
			$option4 = $exam['option4'];
			$option5 = $exam['option5'];
			$answer = $exam['answer'];
			$answer = implode(",", $answer);


			$check = mysqli_query($con, "SELECT * FROM multiple WHERE question_id='$question_id' AND quiz_id='$exam_id' AND course_id = '$course_id'");

			if(mysqli_num_rows($check) == 0)
			{
				$stmt = "INSERT INTO multiple(question_id, question, type, option1, option2, option3, option4, option5, answer, quiz_id, topic_id, course_id, date_created, date_updated) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())";
				$create = mysqli_prepare($con, $stmt);
				mysqli_stmt_bind_param($create, 'sssssssssssi', $question_id, $question, $type, $option1, $option2, $option3, $option4, $option5, $answer, $exam_id, $topic_id, $course_id);
				if(mysqli_execute($create))
				{
					$res = array("status" => "success");
				}
				else
				{
					$res = array("status" => mysqli_error($con));
				}
			}
			elseif(mysqli_num_rows($check) > 0)
			{
				$stmt = "UPDATE multiple SET question = ?, option1 = ?, option2 = ?, option3 = ?, option4 = ?, option5 = ?, answer = ?, date_updated = NOW()  WHERE question_id = ? AND quiz_id = ?";
				$update = mysqli_prepare($con, $stmt);
				mysqli_stmt_bind_param($update, 'sssssssss', $question, $option1, $option2, $option3, $option4, $option5, $answer, $question_id, $exam_id);
				if(mysqli_execute($update))
				{
					$res = array("status" => "success");
				}
				else
				{
					$res = array("status" => "error");
				}
			}

			print json_encode($res);
			
		}
		elseif ($type == "tf")
		{
			$question_id = $exam['question_id'];
			$question = $exam['question'];
			$answer = strval($exam['answer']);

			$check = mysqli_query($con, "SELECT * FROM tf WHERE question_id='$question_id' AND quiz_id='$exam_id' AND course_id = '$course_id'");


			if(mysqli_num_rows($check) == 0)
			{
				$stmt = "INSERT INTO tf(question_id, type, question, answer, quiz_id, topic_id, course_id, date_created, date_updated) VALUES(?,?,?,?,?,?,?,NOW(),NOW())";
				$create = mysqli_prepare($con, $stmt);
				mysqli_stmt_bind_param($create, 'ssssssi', $question_id, $type, $question, $answer, $exam_id, $topic_id, $course_id);
				if(mysqli_execute($create))
				{
					$res = array("status" => "success");
				}
				else
				{
					$res = array("status" => "error");
				}
			}
			elseif(mysqli_num_rows($check) > 0)
			{
				$stmt = "UPDATE tf SET question = ?, answer = ?, date_updated = NOW() WHERE question_id = ? AND quiz_id = ?";
				$update = mysqli_prepare($con, $stmt);
				mysqli_stmt_bind_param($update, 'ssss', $question, $answer, $question_id, $exam_id);
				if(mysqli_execute($update))
				{
					$res = array("status" => "success");
				}
				else
				{
					$res = array("status" => "error");
				}
			}
			print mysqli_error($con);
			print json_encode($res);	
		}
	
	}

	// delete quiz
	if(isset($_POST['deleteQuiz']) && $_POST['deleteQuiz'])
	{
		$question_id = $_POST['deleteQuiz'];

		$stmt = "DELETE FROM single WHERE question_id = ?";
		$stmt2 = "DELETE FROM multiple WHERE question_id = ?";
		$stmt3 = "DELETE FROM tf WHERE question_id = ?";

		$delete = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($delete, 's', $question_id);

		if(mysqli_execute($delete))
		{
			$res = array("status" => "success");
		}
		else
		{
			$res = array("status" => "error");
		}
		$delete = mysqli_prepare($con, $stmt2);
		mysqli_stmt_bind_param($delete, 's', $question_id);
		if(mysqli_execute($delete))
		{
			$res = array("status" => "success");
		}
		else
		{
			$res = array("status" => "error");
			
		}	
		$delete = mysqli_prepare($con, $stmt3);
		mysqli_stmt_bind_param($delete, 's', $question_id);
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