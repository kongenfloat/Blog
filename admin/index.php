<?php 
session_start();
include_once("php/functions.php");
include_once("../blog/access/database_functions.php");


//Check if an action has been done earlier
if(isset($_SESSION['success'])){
    $success = $_SESSION['success']; 
}else{
    $success="";
}
if(isset($_SESSION['err'])){
    $err = $_SESSION['err']; 
}else{
    $err="";
}
?>

<!doctype html>
<html>
<head>
    <title>Admin</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/ajax.js"></script>
</head>

<body>
<div id="container">
    <div id="header">
        <h1 class="center-text">Admin</h1>
        
    </div>
    <div id="content">
    <!--Message from delete ajax call-->
        <p id="msg"></p>
        <?php

            //Success and error messages from earlier actions
            echo $success;
            echo $err; 

            //Check if admin is logged in if not display login form
            if(isset($_SESSION["user"])){

                echo "<a href='http://splend-it.no/admin?page=all' class='center'>Se alle blogginnlegg</a>";
                echo "<a href='http://splend-it.no/admin/php/logout.php' class='center'>Logg ut</a>";
                
                //If global GET contains page then include that page, otherwise landing page : create.php
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    switch ($page) {
                        case "all":
                            include("pages/all.php");
                            break;
                        case "edit":
                            include("pages/edit.php");
                            break;
                        default:
                            include("pages/create.php");
                    }   
                }
            }else{
                include("pages/login.php");
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
if(isset($_SESSION['success'])){
    session_unset($_SESSION['success']);
}
if(isset($_SESSION['err'])){
    session_unset($_SESSION['err']);
}
?>
