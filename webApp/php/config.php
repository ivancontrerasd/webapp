<?php

	function get_dbc(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "webapp";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}else{
			return $conn;
		}
	}

?>