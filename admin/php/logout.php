<?php
   session_start();
   unset($_SESSION["user"]);
   $_SESSION['success'] = "<p>Du er nå logget ut</p>";
   header('Location: http://splend-it.no/admin/');
?>