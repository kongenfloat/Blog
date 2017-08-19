<?php session_start();
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
    
    <!--Local js imports-->
    <script src="js/ajax.js"></script>
</head>

<body>
<div id="container">
    <div id="header">
        <h1 class="center-text">Admin</h1>
    </div>
    <div id="content">
    <!--Message from delete ajax call-->

        <div id="ajax-msg" class="success" style="visibility: hidden;"><p id="msg"></p></div>
        <?php

            //Success and error messages from earlier actions
            echo $success;
            echo $err; 
            
            //Check if admin is logged in if not display login form
            if(isset($_SESSION['user'])){

                //Check to see if a page is specified in global GET
                $page = "";
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }

                echo "<table id='menu' class='center'>";
                echo "<tr>";

                if($page == "all" || $page == "edit"){
                    echo "<td><a href='http://splend-it.no/admin' class='center'>Skriv et blogginnlegg</a></td>";
                }
                if($page == "" || $page == "edit"){
                    echo "<td><a href='http://splend-it.no/admin?page=all' class='center'>Se alle blogginnlegg</a></td>";
                }

                echo "<td><a href='http://splend-it.no/admin/php/logout.php' class='center'>Logg ut</a></td>";
                echo "</tr>";
                echo "</table>";

                //If global GET contains page then include that page, otherwise default landing page : create.php
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
    unset($_SESSION['success']);
}
if(isset($_SESSION['err'])){
    unset($_SESSION['err']);
}
?>
