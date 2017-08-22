<?php

   session_start();
   unset($_SESSION["user"]);
   session_destroy();

   //Start new session for logout message
   session_start();
   $_SESSION['class'] = "success";
   $_SESSION['msg'] = "Du er nå logget ut";
   header('Location: http://splend-it.no/admin/');
   exit();
?>