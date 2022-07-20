<?php

	function prev_date($current_date)
	{
		$current_date = strtotime($current_date);

		$prev_date = strtotime('-7 days', $current_date);

		$prev_date = date('d-m-Y h:m:s', $prev_date);

		return $prev_date;
	}

	function logo_upload($filename, $user_id)
	{
	  $allowed_ext = ["jpg","jpeg","png"]; // These will be the only file extensions allowed
	  $uploadDirectory = "../../images/instructors/";
	  $fileName = $_FILES[$filename]['name'];
	  $fileSize =$_FILES[$filename]['size'];
	  $fileTmpName =$_FILES[$filename]['tmp_name'];
	  $file_type=$_FILES[$filename]['type'];
	  $error = $_FILES[$filename]['error'];
	  $tmp = explode('.',$fileName);
	  $fileExtension=strtolower(end($tmp));
	  $newName = $user_id . "." . $fileExtension;
	  $uploadPath = $uploadDirectory . $newName;

		if (!in_array($fileExtension, $allowed_ext))
	  {
	    return "invalid";
	  }
	  else
	  {
	    if ($error == 0)
	    {

	      if (move_uploaded_file($fileTmpName , $uploadPath))
	      {
	        return "success";
	      }
	      else
	      {
	        return $error ;
	      }
	    }
	    else
	    {
	      return $error;
	    }

	  }

	}

	function video_upload($new_name)
	{
	  $allowed_ext = ["mp4", "webm", "ogg"]; // These will be the only file extensions allowed
	  $uploadDirectory = "../../videos/";
	  $fileName = $_FILES['video']['name'];
	  $fileSize =$_FILES['video']['size'];
	  $fileTmpName =$_FILES['video']['tmp_name'];
	  $file_type=$_FILES['video']['type'];
	  $error = $_FILES['video']['error'];
	  $tmp = explode('.',$fileName);
	  $fileExtension=strtolower(end($tmp));
	  $newName = $new_name . "." . $fileExtension;
	  $uploadPath = $uploadDirectory . $newName;

		if (!in_array($fileExtension, $allowed_ext))
	  {
	    return "invalid";
	  }
	  else
	  {
	    if ($error == 0)
	    {

	      if (move_uploaded_file($fileTmpName , $uploadPath))
	      {
	        return "success";
	      }
	      else
	      {
	        return $error ;
	      }
	    }
	    else
	    {
	      return $error;
	    }

	  }

	}

	function image_upload($new_name)
	{
	  $allowed_ext = ['jpeg', 'jpg', 'png','svg']; // These will be the only file extensions allowed
	  $uploadDirectory = "../../images/content/";
	  $fileName = $_FILES['image']['name'];
	  $fileSize =$_FILES['image']['size'];
	  $fileTmpName =$_FILES['image']['tmp_name'];
	  $file_type=$_FILES['image']['type'];
	  $error = $_FILES['image']['error'];
	  $tmp = explode('.',$fileName);
	  $fileExtension=strtolower(end($tmp));
	  $newName = $new_name . "." . $fileExtension;
	  $uploadPath = $uploadDirectory . $newName;

		if (!in_array($fileExtension, $allowed_ext))
	  {
	    return "invalid";
	  }
	  else
	  {
	    if ($error == 0)
	    {

	      if (move_uploaded_file($fileTmpName , $uploadPath))
	      {
	        return "success";
	      }
	      else
	      {
	        return $error ;
	      }
	    }
	    else
	    {
	      return $error;
	    }

	  }

	}
