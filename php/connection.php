<?php
function connectDB()
{
	$server="localhost";
	$userdb="root";
	$password="";
	$bd="contacts";

	$connect = new mysqli($server,$userdb,$password,$bd);
	return $connect;
}

$connectiondb = connectDB();
?>