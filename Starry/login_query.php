<?php
	require_once 'admin/dbcon.php';
	
	if(isset($_POST['login'])){
		$idno = isset($_POST['idno']) ? trim($_POST['idno']) : '';
		$password = isset($_POST['password']) ? trim($_POST['password']) : '';

		if ($idno === '' || $password === '') {
			echo "<br><center><font color='red' size='3'>Voters only. Enter a valid ID number and password.</font></center>";
			return;
		}
	
		$result = $conn->query("SELECT * FROM voters WHERE id_number = '$idno' && password = '$password' && `account` = 'active' && `status` = 'Unvoted'");

		if (!$result) {
			echo "<br><center><font color='red' size='3'>Unable to sign in right now.</font></center>";
			return;
		}

		$row = $result->fetch_array();
		$voted = $conn->query("SELECT * FROM `voters` WHERE id_number = '$idno' && password = '$password' && `status` = 'Voted'")->num_rows;
		$numberOfRows = $result->num_rows;				
		
		
		if ($numberOfRows > 0){
			session_start();
			$_SESSION['voters_id'] = $row['voters_id'];
			header('location:vote.php');
			exit;
		}
		
		if($voted == 1){
			echo "<br><center><font color='red' size='3'>This voter account has already been used to vote.</font></center>";
		}else{
			echo "<br><center><font color='red' size='3'>Voters only. Invalid login details.</font></center>";
		}
	
	}
?>
