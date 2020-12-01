<?php
	//godaddy connection
	/*$servername = "localhost";
	$username = "peakfunc_aaron";
	$password = "Ramosdc2016!";
	$dbname = "peakfunc_ramos";*/
	
	//local connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ramos";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>