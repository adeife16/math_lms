<?php
	require_once 'config.php';

	$session_matric = $_SESSION['matric'];
	$data = array();

  if($_SERVER['REQUEST_METHOD'] == "GET" && $_GET['course_id'] != "")
  {
    $cid = $_GET['course_id'];
    $result = mysqli_query($con, "SELECT t.topic_id, t.topic_name, c.course_code, c.course_title, c.id FROM topics t, courses c WHERE t.course_id = c.id AND t.course_id = '$cid'");
    if($result)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        array_push($data, $row);
      }
      $res = array('status' => "success", "data" => $data);
    }
    else
    {
      $res = array('status' => "error" );
    }
    print json_encode($res);

  } 
