<?php
	session_start();
	include_once("../../blog/access/database_functions.php");
	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];

		//Database call
		delete($id);
		//Message to display
		echo "Blogginlegget har blitt slettet";
	}

?>