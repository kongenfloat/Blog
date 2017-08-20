<?php
session_start();
include_once("../../blog/access/database_functions.php");
include_once("functions.php");

//Check if submit is clicked, if not redirect to admin.php with error message.
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
	$heading = test_input($heading);
	$blog_text = test_input($blog_text);
	//$image = "test";


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