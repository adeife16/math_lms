<?php
    require_once 'config.php';
    $data = array();

    if( isset($_GET['topic_id']) && $_GET['topic_id'] != "")
    {
        $topic_id = $_GET['topic_id'];
        $index = $_GET['index'];

        $content = mysqli_query($con, "SELECT c.content, c.c_index, c.c_title, t.topic_name, t.topic_id,cs.course_code, cs.course_title, cs.id AS course_id FROM content c, topics t, courses cs WHERE t.course_id = cs.id AND c.topic = t.topic_id AND c.topic = '$topic_id' AND c.c_index = '$index'");

        
        if(mysqli_num_rows($content) > 0)
        {
            $row = mysqli_fetch_assoc($content);
            
            $res = array("status" => "success", "data" => $row);
        }
        else
        {
            $res = array("status" => mysqli_error($con));
        }
        print json_encode($res);
    }
    
    // get next topic

 if( isset($_GET['getNext']) && isset($_GET['course_id']))
  {

  	$current_topic = $_GET['getNext'];
    $current_course = $_GET['course_id'];
    $index = $_GET['index'];

  	$stmt = "SELECT c_index from content WHERE c_index > ? AND topic = ? ORDER BY id ASC LIMIT 1";

  	$get = mysqli_prepare($con, $stmt);

  	mysqli_stmt_bind_param($get, 'is', $index, $current_topic);

  	mysqli_execute($get);

  	$result = mysqli_stmt_get_result($get);

  	if( mysqli_num_rows($result) > 0)
  	{
        $row = mysqli_fetch_assoc($result);
        $index = $row['c_index'];
        $data = array("topic_id" => $current_topic, "c_index" => $index);

        $res = array("status" => "success", "data" => $data);
        print json_encode($res);
  	}
    else
    {
        $res = array("status" => "end");
        print json_encode($res);
    }
  }

  if(isset($_GET['getPrev']) && isset($_GET['getPrev']))
  {

  	$current_topic = $_GET['getPrev'];
    $current_course = $_GET['course_id'];
    $index = $_GET['index'];

  	$stmt = "SELECT c_index from content WHERE c_index < ? AND topic = ? ORDER BY id ASC LIMIT 1";

  	$get = mysqli_prepare($con, $stmt);

  	mysqli_stmt_bind_param($get, 'is', $index, $current_topic);

  	mysqli_execute($get);

  	$result = mysqli_stmt_get_result($get);

  	if( mysqli_num_rows($result) > 0)
  	{
        $row = mysqli_fetch_assoc($result); 
        $index = $row['c_index'];
        $data = array("topic_id" => $current_topic, "c_index" => $index);

        $res = array("status" => "success", "data" => $data);
        print json_encode($res);
  	}
    else
    {
        $res = array("status" => "end");
        print json_encode($res);
    }
  }