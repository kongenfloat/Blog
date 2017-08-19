<?php
   session_start();
   unset($_SESSION["user"]);
   session_destroy();
   $_SESSION['success'] = "<div class='success'><p>Du er nå logget ut</p></div>";
   header('Location: http://splend-it.no/admin/');
   exit();
?>