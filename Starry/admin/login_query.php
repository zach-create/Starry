<?php
	require_once 'dbcon.php';
	
	if(isset($_POST['login']))
	{
		$username = isset($_POST['username']) ? trim($_POST['username']) : '';
		$password = isset($_POST['password']) ? trim($_POST['password']) : '';

		if ($username === '' || $password === '') {
			echo "<br><center><font color='red' size='3'>Admins only. Enter a valid username and password.</font></center>";
			return;
		}
	
		
		$query = $conn->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

		if (!$query) {
			echo "<br><center><font color='red' size='3'>Unable to sign in right now.</font></center>";
			return;
		}

		$rows = $query->num_rows;
		$fetch = $query->fetch_array();
																		
		if ($rows == 0) 
		{
			echo "<br><center><font color='red' size='3'>Admins only. Invalid login details.</font></center>";
		} 
		else if ($rows > 0)
		{
			session_start();
			$_SESSION['id'] = $fetch['user_id'];
			header("location:candidate.php");
			exit;
		}
	
	}
	?>
