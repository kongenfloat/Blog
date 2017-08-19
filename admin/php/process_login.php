<?php
	session_start();
	
	if(isset($_POST["submit"])){
		if(isset($_POST["password"])){
			$password = $_POST["password"];
			if($password == "demo"){
				$_SESSION['user'] = "admin";
			}else{
				$_SESSION['err'] = "<p>Feil passord</p>";
			}
		}else{
			$_SESSION['err'] = "<p>Du må skrive inn et passord</p>";
		}
	}else{
		$_SESSION['err'] = "<p>Ingen tilgang</p>";
	}

	header("Location: http://splend-it.no/admin/");
?>