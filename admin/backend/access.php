<?php
	require_once 'config.php';

	
	if(isset($_POST['email']) && $_POST['email'] != "")
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$stmt = "SELECT * FROM admin WHERE email = ? AND status = 'active'";
		$get_stmt = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($get_stmt, 's', $email);
		mysqli_execute($get_stmt);
		$result = mysqli_stmt_get_result($get_stmt);
		if(mysqli_num_rows($result) == 1)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$fname = $row['fname'];
				$role = $row['role'];
			}

			// set session
			$_SESSION['fname'] = $fname;
			$_SESSION['email'] = $email;
			$_SESSION['role'] = $role;
			$data = array("fname" => $fname, "role" => $role);
			$res = array("status" => "success", "data" => $data);
		}
		else
		{
			$res = array("status" => "error");
		}

		print json_encode($res);
	}
		// print password_hash('goradoom', PASSWORD_DEFAULT);