<?php

	require_once '../config.php';
	// require_once 'functions.php';


// Login API Functionality
if (isset($_POST['matric'])) {

	$matric = $_POST['matric'];
	$password = $_POST['password'];


	// validate form input
	if($matric == "" || $password == "")
	{

	}
	else
	{
		// check if user exists
		$stmt = "SELECT * FROM student WHERE matric = ?";
		$select_stmt = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($select_stmt, 's', $matric);
		mysqli_execute($select_stmt);
		$result = mysqli_stmt_get_result($select_stmt);
		if(mysqli_num_rows($result) == 1)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$hash = $row['password'];
				$matric = $row['matric'];
				$fname = $row['fname'];
				$lname = $row['lname'];
				$picture = $row['picture'];

			}
			// verify password
			if(password_verify($password, $hash))
			{
				// set session variable
				$_SESSION['matric'] = $matric;
				$_SESSION['fname'] = $fname;
				$_SESSION['lname'] = $lname;
				$_SESSION['pic'] = $picture;

				// Log event
				$stmt = "INSERT INTO logs(user_id, user_type, activity, date_created) VALUES(?, 'student', 'Logged In', NOW())";
				$log = mysqli_prepare($con, $stmt);
				mysqli_stmt_bind_param($log, 's', $matric);
				mysqli_execute($log);
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

		print json_encode($res);
	}
	
}