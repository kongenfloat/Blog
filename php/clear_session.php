<?php
session_start();

if(isset($_SESSION["heading"])){
	unset($_SESSION["heading"]);
}

if(isset($_SESSION["blog_text"])){
	unset($_SESSION["blog_text"]);
}

if(isset($_SESSION["edit_heading"])){
	unset($_SESSION["edit_heading"]);
}

if(isset($_SESSION["edit_blog_text"])){
	unset($_SESSION["edit_blog_text"]);
}

if(isset($_GET["page"])){
	$page = $_GET["page"];
	header("Location: http://splend-it.no/admin/?$page");
}else{
	header("Location: http://splend-it.no/admin/");
}

?>