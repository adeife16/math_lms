<?php

	require_once 'functions.php';

	$filename = $_POST['topic_id'];

	$fileName = $_FILES['image']['name'];
	$tmp = explode('.',$fileName);
	$fileExtension=strtolower(end($tmp));

	$upload = image_upload($filename);

	if($upload == "success")
	{
		print json_encode(array("link" => '/lms/images/content/'. $filename.'.'.$fileExtension));
	}