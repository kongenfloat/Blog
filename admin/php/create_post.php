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
			$_SESSION['err'] = "<div class='warning'><p>Tittelen kan maks inneholde 100 tegn. Du har $num tegn nå </p></div>";
		}
		if(strlen($blog_text) > 20000){
			$num = strlen($blog_text);
			$_SESSION['err'] = "<div class='warning'><p>Innlegget kan maks inneholde 20000 tegn. Du har $num tegn nå </p></div>";
		}

		
		header("Location: http://splend-it.no/admin/");
		exit();  
	}

	// check if fileToUpload is empty and not an error
	if ($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 0){
    
		//Uploads image and returns the path
		$image = upload_image();
	}
		
	//Insert new post in database
	new_post($heading, $blog_text, $image);
	$_SESSION['success'] = "<div class='success'><p>Blogginnlegget har blitt opprettet</p></div>";
	//Redirect back to index
	header("Location: http://splend-it.no/admin/?page=all");
	exit();
}else{
	//TODO: Redirect to error page. Reason : Permission denied. 
}
?>
