<?php
	require_once 'config.php';

	$session_matric = $_SESSION['matric'];
	$data = array();						

	// check for get request
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$stmt = "SELECT s.*, f.facultyName, d.dept_name, c.name FROM student s, faculty f, department d, countries c WHERE s.faculty = f.id AND s.department = d.id AND s.nationality = c.id AND s.matric = ?";
		$student = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($student, 's', $session_matric);
		mysqli_execute($student);
		$result = mysqli_stmt_get_result($student);
		if (mysqli_num_rows($result) == 1)
		{
			while($row = mysqli_fetch_assoc($result))
			{	unset($row['password']);
				array_push($data, $row);
			}
			$res = array("status" => "success", "data" => $data);
		}
		else
		{
			$res = array("status" => "error", "data" => null);
		}
		print json_encode($res);
	}

	// update form details
	if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$email = $_POST['email'];
		$level = $_POST['level'];
		$nationality = $_POST['nationality'];
		$phone = $_POST['phone'];
		$about = $_POST['about'];

		if($email == "" || $level == "" || $nationality == "" || $phone == "" || $about == "")
		{

		}
		else
		{
			$stmt = "UPDATE student SET email = ?, level = ?, nationality = ?, phone = ?, about = ?, date_updated = 'NOW()' WHERE matric = ?";
			$update_stmt = mysqli_prepare($con, $stmt);
			mysqli_stmt_bind_param($update_stmt,'ssssss', $email, $level, $nationality, $phone, $about, $session_matric);
			if(mysqli_execute($update_stmt))
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

	// update password
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['oldPass']))
	{
		$old_pass = $_POST['oldPass'];
		$new_pass = password_hash( $_POST['newPass'], PASSWORD_DEFAULT);

		$stmt = "SELECT password FROM student WHERE matric = ?";
		$get_stmt = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($get_stmt, 's', $session_matric);
		mysqli_execute($get_stmt);
		$result = mysqli_stmt_get_result($get_stmt);
		if(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);
			$old_pass_hash = $row['password'];

			if(password_verify($old_pass, $old_pass_hash))
			{
				$stmt = "UPDATE student SET password = ? WHERE matric = ?";
				$update_stmt = mysqli_prepare($con, $stmt);
				mysqli_stmt_bind_param($update_stmt, 'ss', $new_pass, $session_matric);
				if(mysqli_execute($update_stmt))
				{
					$res = array("status" => "success");
				}
				else
				{
					$res = array("status" => "error");
				}
			}
		}
		else
		{
			$res = array("status" => "error");

		}
		print json_encode($res);
	}