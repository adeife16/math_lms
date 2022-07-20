<?php
	require_once 'config.php';
  require_once 'functions.php';
	$data = array();

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['checkemail'])){
    $mail = $_GET['checkemail'];

    $stmt = "SELECT * FROM admin WHERE email = ?";
    $get = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($get, 's', $mail);
    mysqli_execute($get);
    $result = mysqli_stmt_get_result($get);
    if(mysqli_num_rows($result) > 0)
    {
      $res = array("exist" => true);
    }
    else
    {
      $res = array("exist" => false);
    }
    print(json_encode($res));
  }
