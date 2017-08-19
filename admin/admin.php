<?php 
include_once("php/functions.php");
include_once("../blog/access/database_functions.php");
?>
<!doctype html>
<html>
<head>
    <title>Admin</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div id="container">
    <div id="header">
        <h1 class="center-text">Admin</h1>
        <a href="http://splend-it.no/admin/admin.php?page=all" class="center">Se alle blogginnlegg</a>
    </div>
    <div id="content">
        <?php 
            //Check which page to show
            if(isset($_GET['page'])){
                if(isset($_GET['page']) == "all"){
                    include("pages/all.php");
                }   
            }else{
                include("pages/create.php");
            }
        ?>
    </div>
</div>
</body>
</html>
