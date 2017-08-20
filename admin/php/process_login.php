<?php session_start();
include_once("../../blog/access/database_functions.php");


$user = get_user("admin");
$stored_password = $user["password"];

if(isset($_POST["submit"])){
	if(isset($_POST["password"])){
		$password = $_POST["password"];
		if(md5($password) == $stored_password){
			$_SESSION['user'] = "admin";
		}else{
			$_SESSION['class'] = "warning";
			$_SESSION['msg'] = "Feil passord";
		}
	}else{
		$_SESSION['class'] = "warning";
		$_SESSION['msg'] = "Du må skrive inn et passord";
	}
}else{
	$_SESSION['class'] = "warning";
	$_SESSION['msg'] = "Ingen tilgang";
}

header("Location: ../index.php");
exit();
?>