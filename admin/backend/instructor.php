<?php
	require_once 'config.php';
  require_once 'functions.php';
	$data = array();

  if(isset($_POST['fname']) && $_POST['fname'] != "")
  {
    $error_status = 0;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con-pass'];
    $about = $_POST['about'];
    $user_id = substr(md5(time()), 5, 15);
    if($pass == $con_pass)
    {
      $pass = password_hash($pass, PASSWORD_DEFAULT);
    }
    else
    {
      $error_status = 1;
    }
    if(isset($_FILES['pic']['name']) && $_FILES['pic']['name'] != "")
    {
      $pic = logo_upload('pic', $user_id);
      if($pic == "success")
      {
        $tmp = explode('/',$_FILES['pic']['type']);
        $ext = strtolower(end($tmp));
        if($ext == "jpeg")
        {
          $ext = "jpg";
        }
        $pic = strval($user_id) . '.' . $ext;

      }
      else
      {
        // print $_FILES['logo']['error'];
        $error_status = 1;
      }
    }
    if($error_status == 0)
    {
      $stmt = "INSERT INTO admin(user_id, fname, lname, email, password, about, picture, role, date_created) VALUES(?,?,?,?,?,?,?,'instructor', NOW())";
      $add = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($add, 'sssssss', $user_id, $fname, $lname, $email, $pass, $about, $pic);
      if(mysqli_execute($add))
      {
        $res = array("status" => "success");
      }
      else
      {
        $res = array("status" => "error");
      }
      print json_encode($res);

    }
    else
    {
      // $res = array("status" => "error");
      // print json_encode ($res);
      print $pic;
    }
  }
