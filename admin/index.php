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
        <a href="http://splend-it.no/admin?page=all" class="center">Se alle blogginnlegg</a>
    </div>
    <div id="content">
    <!--Display message from delete ajax call-->
        <p id="msg"></p>
        <?php 

            //Success and error messages from earlier actions
            echo $success;
            echo $err; 

            //Check which page to display
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
                }   
            }else{
                include("pages/create.php");
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
