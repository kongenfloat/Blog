<?php 

	function get_datetime(){
    	$date_utc = new DateTime(null, new DateTimeZone("UTC"));
        $date_utc->modify('+ 2 hour');//Server is two hours behind
    	$date_utc = $date_utc->format('Y-m-d H:i:s');
    	return $date_utc;
	}

	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}


  function upload_image(){
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $imgname = uniqid("img_",true) . "." . $imageFileType;
    //$imgname = $target_dir . $imgname;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        //echo "Sorry, only JPG, JPEG & PNG  are allowed.";
        $uploadOk = 0;
        $imgname = "not_supported";
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $imgname)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $imgname = "../uploads/" . $imgname;
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    }

    
    return $imgname;
  }

function get_client_ip(){
    $ip = getenv('HTTP_CLIENT_IP')?:
    getenv('HTTP_X_FORWARDED_FOR')?:
    getenv('HTTP_X_FORWARDED')?:
    getenv('HTTP_FORWARDED_FOR')?:
    getenv('HTTP_FORWARDED')?:
    getenv('REMOTE_ADDR');

    return $ip;
}

function check_ip($id){
    $list = get_ip_list_with_id($id);

    $ip = get_client_ip();

    $found = false;

    foreach ($list as $element => $value) {
        if( $ip == $list[$element]['ip']){
            $found = true;
        }
    }
    return $found;
}

function minimize($text, $length){
    $text = substr ($text , 0, $length);
    $text = $text . "...";
    return $text;
}
?>