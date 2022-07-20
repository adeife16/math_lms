<?php

	function create_folders($course)
	{
		$folderName = '../content/'.$course;
		$config['upload_path'] = $folderName;
		if(!is_dir($folderName))
		{
			mkdir($folderName, 0777, true);
			mkdir($folderName.'/video', 0777, true);
			mkdir($folderName.'/text', 0777, true);
			print("done");
		}
	}

	create_folders("MTH111");