<?php
  require_once 'config.php';

  $data = array();

  if(isset($_POST['getContents']) && $_POST['getContents'])
  {
    $topic = $_POST['getContents'];
    $course = $_POST['course'];

    $stmt = "SELECT * FROM content WHERE topic = ?";
    $get_content = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($get_content, 's', $topic);
    mysqli_execute($get_content);
    $result = mysqli_stmt_get_result($get_content);
    if($result)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        array_push($data, $row);
      }
      $res = array("status" => "success", "data" => $data);
    }
    else
    {
      $res = array("status" => mysqli_error($con));
    }
    print json_encode($res);
  }