<?php
session_start();
$_SESSION['login'] = false;
session_destroy();
header("location:../login.php"); // back to admin page.

?>