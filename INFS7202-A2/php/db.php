<?php

function connect(){
	//Create connection
	//you can use new mysqli or mysqli_connect
	$conn=mysqli_connect('127.0.0.1', 'root', '', 'blog_comments');
	if(!$conn){
		die("Connection failed: " + $conn->connect_error());
	}
	return $conn;
}
?>
