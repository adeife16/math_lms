<?php

	require_once 'config.php';

	$data = array();

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$code = mysqli_query($con, "SELECT id, course_code, course_title FROM courses");
		if($code)
		{
			while($row = mysqli_fetch_assoc($code))
			{
				array_push($data, $row);
			}
			$res = array("status" => "success", "data" => $data);
		}
		else
		{
			$res = array("status" => "error", "data" => mysqli_error($con));
		}
		print json_encode($res);
	}

// create topic
	if(isset($_POST['tTitle']) && $_POST['tTitle'] != "")
	{
		$cid = $_POST['course'];
		$topic = strtoupper($_POST['tTitle']);
		$topic_id = substr(md5(time()), 10,18);

		$stmt = "INSERT INTO topics(topic_id, topic_name, course_id, date_created, date_updated) VALUES(?, ?, ?, NOW(), NOW())";
		$create_topic = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($create_topic, 'ssi', $topic_id, $topic, $cid);
		if(mysqli_execute($create_topic))
		{
			$res = array("status" => "success", "data" => $topic_id);
		}
		else
		{
			$res = array("status" => "error");
		}

		print json_encode($res);
	}
// get all Topics
if(isset($_POST['getTopics']))
{
	$topics = mysqli_query($con, "SELECT t.*, c.course_code, c.course_title FROM topics t, courses c WHERE t.course_id = c.id");
	if($topics)
	{
		while($row = mysqli_fetch_assoc($topics))
		{
			array_push($data, $row);
		}
		$res =array("status" => "success", "data" => $data);
	}
	else
	{
		$res = array("status" => "error");
	}
	print json_encode($res);
}

// delete a topic
if(isset($_POST['delete']) && $_POST['delete'] != "")
{
	$topic_id = $_POST['delete'];

	$stmt = "DELETE FROM topics WHERE topic_id = ?";
	$del = mysqli_prepare($con, $stmt);
	mysqli_stmt_bind_param($del, 's', $topic_id);
	if(mysqli_execute($del))
	{
		$stmt = "DELETE FROM content WHERE topic = ?";
			$del = mysqli_prepare($con, $stmt);
			mysqli_stmt_bind_param($del, 's', $topic_id);

			$res = array("status" => "success");
	}
	else
	{
		$res = array("status" => mysqli_error($con));
	}
	print json_encode($res);
}

if(isset($_POST['getContents']) && $_POST['getContents'] != "")
{
	$topic_id = $_POST['getContents'];

	$stmt = "SELECT c.*, t.topic_name FROM content c, topics t WHERE c.topic = t.topic_id AND c.topic = ?";
	$getContents = mysqli_prepare($con, $stmt);
	mysqli_stmt_bind_param($getContents, 's', $topic_id);
	mysqli_execute($getContents);
	$result = mysqli_stmt_get_result($getContents);

	if(mysqli_num_rows($result) > 0)
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
//  delete a content
if(isset($_POST['deleteContent']) && $_POST['deleteContent'] != "")
{
	$index = $_POST['deleteContent'];
	$topic = $_POST['topic'];

	$stmt = "DELETE FROM content WHERE c_index = ? AND topic = ?";
	$del = mysqli_prepare($con, $stmt);
	mysqli_stmt_bind_param($del, 'is', $index, $topic);
	if(mysqli_execute($del))
	{
		$res = array("status" => "success");
	}
	else
	{
		$res = array("status" => mysqli_error($con));
	}

	print json_encode($res);
}