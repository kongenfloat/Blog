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
			$_SESSION['err'] = "<div class='warning'><p>Feil passord</p></div>";
		}
	}else{
		$_SESSION['err'] = "<div class='warning'><p>Du må skrive inn et passord</p></div>";
	}
}else{
	$_SESSION['err'] = "<div class='warning'><p>Ingen tilgang</p></div>";
}

header("Location: ../index.php");
exit();
?>