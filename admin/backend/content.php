<?php

	require_once 'config.php';

	$data = array();

	// get a content
	if(isset($_POST['getContent']) && $_POST['getContent'] != "")
	{
		$topic = $_POST['getContent'];
		$index = $_POST['content'];

		// get topic name
		$stmt = "SELECT topic_name from topics WHERE topic_id = ? ";
		$topic_name = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($topic_name, 's', $topic);
		mysqli_execute($topic_name);
		$result = mysqli_stmt_get_result($topic_name);
		if(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);
			$topic_name = $row['topic_name'];
		}
		else
		{

		}

		$stmt = "SELECT content FROM content WHERE topic = ? AND c_index = ?";
		$get = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($get, 'si', $topic, $index);
		mysqli_execute($get);
		$result = mysqli_stmt_get_result($get);
		if(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);
			$content = $row['content'];
			$res = array("status" => "success", "data" => $content, "topic" => $topic_name);
		}
		else
		{
			$res = array("status" => "error", "topic" => $topic_name);
		}

		print json_encode($res);
	}

  // save a content
  if(isset($_POST['saveContent']) && $_POST['saveContent'] != "")
  {
    $content = $_POST['saveContent'];
    $topic = $_POST['topicId'];
    $index = $_POST['contentIndex'];
    $title = $_POST['contentTitle'];

		// check if content exists
		$stmt = "SELECT id FROM content WHERE topic = ? AND c_index = ? ORDER BY id DESC LIMIT 1";
		$check = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($check,'si',$topic, $index);
		mysqli_execute($check);
		$result = mysqli_stmt_get_result($check);
		if(mysqli_num_rows($result) == 1)
		{
			$stmt = "UPDATE content SET content = ?, date_updated = NOW() WHERE topic = ? AND c_index = ?";
			$update = mysqli_prepare($con, $stmt);
			mysqli_stmt_bind_param($update, 'ssi', $content, $topic, $index);
			if(mysqli_execute($update))
			{
				$res = array("status" => "success");
			}
			else
			{
				$res = array('status' => "error");
			}
		}
		else
		{
			// $row = mysqli_fetch_assoc($result);
			// $index = $row['c_index'] + 1;
			$stmt = "INSERT INTO content(topic, c_index, c_title, content, date_created, date_updated) VALUES(?, ?, ?, ?, NOW(), NOW())";
			$insert_content = mysqli_prepare($con, $stmt);
			mysqli_stmt_bind_param($insert_content, 'siss', $topic, $index, $title, $content);
			if(mysqli_execute($insert_content))
			{
				$res = array("status" => "success");
			}
			else
			{
				$res = array('status' => mysqli_error($con));
			}

		}


    print json_encode($res);
  }
