<?php
session_start();
unset($_SESSION["gmail_token"]);
session_unset();
session_destroy();
echo" you are not logged in ";
// header("location:../login/login.php");
header("location: http://localhost/facebook/login.php");
exit();