<?php session_start();
include_once("../../blog/access/database_functions.php");
include_once("functions.php");


//Check if submit is clicked, if not redirect to admin with error message.
if(isset($_POST['submit'])){
	
	unset($_SESSION['heading']);
	unset($_SESSION['blog_text']);

	$heading = $_POST['heading'];
	$blog_text = $_POST['blog_text'];
	

	$heading = test_input($heading);
	$blog_text = test_input($blog_text);
	$image = "test";


	//Check length of inputs corresponding to database
	if(strlen ($heading) > 100 || strlen ($blog_text) > 20000){

		$_SESSION["heading"] = $heading;
		$_SESSION["blog_text"] = $blog_text;

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

		
		header("Location: http://splend-it.no/admin/");
		exit();  
	}

	// check if fileToUpload is empty and not an error
	if ($_FILES['fileToUpload']['size'] != 0 && $_FILES['fileToUpload']['error'] == 0){
		
		//Uploads image and returns the path
		$image = upload_image();
	}else{
		$image = "null";
	}
		
	//Insert new post in database
	new_post($heading, $blog_text, $image);
	$_SESSION['class'] = "success";
	$_SESSION['msg'] = "Blogginnlegget har blitt opprettet";
	//Redirect back to index
	header("Location: http://splend-it.no/admin/?page=all");
	exit();
}else{
	//TODO: Redirect to error page. Reason : Permission denied. 
}
?>
