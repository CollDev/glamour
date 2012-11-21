<?php

	// Set your return content type
	header('Content-type: text/xml');

	$mediaArr = array();

    // allowed extensions
    $file_display = array('mp3');

    //directory to read
    $dir = ($_REQUEST['folderUrl']);

	if(file_exists($dir)==false){
		echo 'Directory \'', $dir, '\' not found!';
	}else{
		$dir_content = scandir($dir);
		//print_r($dir_content);
		
		foreach($dir_content as $file){
			
			$file_type = explode(".", $file);
			$extension = strtolower(array_pop($file_type));   
			$fileName = array_shift($file_type);

			if($file !== '.' && $file !== '..' && in_array($extension, $file_display) == true){
				//echo $dir . $file, '<br>';
				$mediaArr[] = $dir . $file;
			}
		}
		
		echo json_encode($mediaArr);
	}
?>
