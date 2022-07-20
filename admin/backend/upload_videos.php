<?php

	require_once 'functions.php';

	$filename = $_POST['topic_id'];

	$fileName = $_FILES['video']['name'];
	$tmp = explode('.',$fileName);
	$fileExtension=strtolower(end($tmp));

	$upload = video_upload($filename);

	if($upload == "success")
	{
		print json_encode(array("link" => '/lms/videos/'. $filename.'.'.$fileExtension));
	}