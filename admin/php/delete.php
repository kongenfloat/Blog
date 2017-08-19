<?php
		include_once("../../blog/access/database_functions.php");
		if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];

			delete($id);
		}

?>