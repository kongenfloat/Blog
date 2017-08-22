<?php
session_start();
include_once("../access/database_functions.php");
include_once("functions.php");

if(isset($_POST['submit'])){
	//No need to store these anymore
	if(isset($_SESSION['edit_heading'])){
		unset($_SESSION['edit_heading']);	
	}
	if(isset($_SESSION['edit_blog_text'])){
		unset($_SESSION['edit_blog_text']);	
	}

	$heading = $_POST['heading'];
	$blog_text = $_POST['blog_text'];
	$id = $_POST['id'];
	$post = get_post($id);

	$image = $post['image'];

	//Sanitizes inputs
	$heading = test_input($heading);
	$blog_text = test_input($blog_text);


	//Check length of inputs corresponding to database
	if(strlen ($heading) > 100 || strlen ($blog_text) > 20000){
		$_SESSION["edit_heading"] = $heading;
		$_SESSION["edit_blog_text"] = $blog_text;
		$_SESSION["edit_id"] = $id;

		//Error messages
		if(strlen($heading) > 100){
			$num = strlen($heading);
			$_SESSION['class'] = "warning";
			$_SESSION['msg'] = "Tittelen kan maks inneholde 100 tegn. Du har $num tegn nå.";
		}
		if(strlen($blog_text) > 20000){
			$num = strlen($blog_text);
			$_SESSION['class'] = "warning";
			$_SESSION['msg'] = "Innlegget kan maks inneholde 20000 tegn. Du har $num tegn nå.";
		}

		
		header("Location: http://splend-it.no/admin/?page=edit&id=$id");
		exit(); 
	}

	// check if fileToUpload is empty and not an error
	if ($_FILES['fileToUpload']['size'] != 0 && $_FILES['fileToUpload']['error'] == 0){
		
		//old_image is goning to be used for deleting later
		$old_image = $image;	

		//Uploads image and returns the path
		$image = upload_image();
	}




	//If file is not supported then it will not be uploaded
	if($image != "not_supported"){
		//Insert new post in database
		edit_post($id, $heading, $blog_text, $image);

		//Check if post has an previous image.
		if(isset($old_image)){
			if($old_image != "null") {
				//Deletes previous image
				unlink($old_image);
			}
		}


		//Success message
		$_SESSION['class'] = "success";
		$_SESSION['msg'] = "Blogginnlegget har blitt opprettet";
	}else{
		$_SESSION['class'] = "warning";
		$_SESSION['msg'] = "Dette filformatet er ikke mulig å laste opp. ";
		$_SESSION['edit_heading'] = $heading;
		$_SESSION['edit_blog_text'] = $blog_text;
		header("Location: http://splend-it.no/admin/?page=edit&id=$id");
		exit();
 	}

	//Redirect back to admin?page=all
	header("Location: http://splend-it.no/admin?page=all");
	exit();
}
?>