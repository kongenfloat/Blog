<?php
	include_once("../../blog/access/database_functions.php");
	$password = "demo";
	$password = md5($password);

	$username = "admin";

	add_user($username, $password);

?>