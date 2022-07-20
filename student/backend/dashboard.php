<?php
	require_once 'config.php';
	$session_matric = $_SESSION['matric'];

	$data = array();

	if(isset($_POST['getEnrolled']))
	{
		$get_enrolled = mysqli_query($con, "SELECT e.*, c.course_code, c.course_title FROM course_enroll e, courses c WHERE e.course_id = c.id AND e.matric = '$session_matric'");
		if($get_enrolled)
		{
			if(mysqli_num_rows($get_enrolled) > 0)
			{
				while($row = mysqli_fetch_assoc($get_enrolled))
				{
					array_push($data, $row);
				}
				$res = array("status" => "success", "data" => $data);
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

		print json_encode($res);
	}