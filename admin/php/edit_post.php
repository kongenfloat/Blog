<?php
session_start();
include_once("../../blog/access/database_functions.php");
include_once("functions.php");

//Check if submit is clicked, if not redirect to admin.php with error message.
if(isset($_POST['submit'])){

	$heading = $_POST['heading'];
	$blog_text = $_POST['blog_text'];
	$id = $_POST['id'];
	$post = get_post($id);

	$image = $post['image'];
	$heading = test_input($heading);
	$blog_text = test_input($blog_text);
	//$image = "test";


	//Check length of inputs corresponding to database
	if(strlen ($heading) > 100 || strlen ($blog_text) > 20000){
		//TODO: 
		//Too many characters
	}

	// check if fileToUpload is empty and not an error
	if ($_FILES['fileToUpload']['size'] != 0 && $_FILES['fileToUpload']['error'] == 0){
		
		//Check if the post already has an image
		if($image != "null"){
			$image = "../" . $image;
			//Deletes previous image
			unlink($image);
		}	
		//Uploads image and returns the path
		$image = upload_image();
	}

	//Insert new post in database
	edit_post($id, $heading, $blog_text, $image);

	//Success message
	$_SESSION['class'] = "success";
	$_SESSION['msg'] = "Blogginnlegget har blitt endret";

	//Redirect back to admin?page=all
	header("Location: http://splend-it.no/admin?page=all");
	exit();
}else{
	//TODO:
	//Handle what to do if submit is not clicked
}
?>