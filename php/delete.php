<?php
	session_start();
	if(isset($_SESSION['user'])){
		include_once("../access/database_functions.php");
		if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];

			//Stores image path to delete after database call
			$post = get_post($id);
			$image = $post['image'];

			//Database call
			delete($id);

			//Deletes image if an image exists
			if($image != "null"){
				unlink($image);
			}	
			//Message to display
			echo "Blogginnlegget har blitt slettet";
		}
	}else{
		echo "HTTP 550: Permission denied";
	}

?>