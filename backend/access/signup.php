 <?php
	require_once '../config.php';

	if(isset($_POST['first_name']) && $_POST['first_name'] != "")
	{
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$email = $_POST['email'];
		$matric = $_POST['matric'];
		$dob = $_POST['dob'];
		$faculty = $_POST['faculty'];
		$dept = $_POST['dept'];
		$level = $_POST['level'];
		$pass = $_POST['password'];
		$con_pass = $_POST['confirm_password'];

		// validate form data
		if($fname == ""  || $lname == "" || $email == "" || $matric == "" || $dob == "" || $faculty == "" || $dept == "" || $pass == ""  || $pass != $con_pass)
		{

		}
		else
		{
			$pass = password_hash($pass, PASSWORD_DEFAULT);
			$stmt = "INSERT INTO student(matric, fname, lname, email, password, level, picture, faculty, department, dob, date_joined, date_updated) VALUES(?,?,?,?,?,?,'nopic.jpg',?,?,?,NOW(), NOW())";
			$insert_stmt = mysqli_prepare($con, $stmt);
			mysqli_stmt_bind_param($insert_stmt, 'ssssssiis', $matric, $fname, $lname, $email, $pass, $level, $faculty, $dept, $dob);
			if(mysqli_execute($insert_stmt))
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