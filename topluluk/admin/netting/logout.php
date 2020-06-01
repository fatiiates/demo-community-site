<?php

  session_start();
  session_destroy();

  header("Location:sa-login.php");


?>
