<?php 
include_once("connection.php");
session_start();
session_destroy();
session_unset();
 header("location: index.php");


 ?>
