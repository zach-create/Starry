<?php
	$db_host = getenv('DB_HOST') ?: 'localhost';
	$db_user = getenv('DB_USER') ?: 'root';
	$db_pass = getenv('DB_PASSWORD') ?: '';
	$db_name = getenv('DB_NAME') ?: 'voting';

	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

	if ($conn->connect_error) {
		die("Error: Failed to connect to database");
	}
?>	
