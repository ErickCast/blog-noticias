<?php
$server="localhost";
$user="root";
$password="";
$db_name="blog_noticias";

$db=mysqli_connect($server, $user, $password, $db_name);
mysqli_query($db, "SET NAMES 'utf8'");


if(!isset($_SESSION)){
	session_start();
}


?>