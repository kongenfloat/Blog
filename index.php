<?php 
session_start();
include_once("access/database_functions.php");
include_once("../admin/php/functions.php");


?>

<!doctype html>
<html>
<head>
    <title>Blogg</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/ajax.js"></script>
</head>

<body>
<div id="container">
    <div id="header">
        <h1 class="center-text">Trollweb blogg oppgave</h1>
    </div>
    <div id="content">


        <?php 
            //Check if user has chosen a specific post
            //else show list of blog posts
            if(isset($_GET['id'])){
                include("pages/show.php");   
            }else{
                include("pages/list.php");
            }
        ?>

    </div>
</form>
</div>
</body>
</html>

<?php
//Removes used message variables in session
//Will not be displayed anymore after reload
if(isset($_SESSION['like_msg'])){
    unset($_SESSION['like_msg']);
}
?>