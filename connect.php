<?php
$hostname = "localhost";
$user = "root";
$password = "";
$database = "orphanage";

$conn = mysqli_connect($hostname, $user, $password,$database) or die(mysqli_connect_error());
 
?>