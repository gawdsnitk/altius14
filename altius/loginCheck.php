<?php
	require_once("database.php");
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sql = "SELECT * FROM users WHERE UserName = '$_POST[username]' AND Password = '$_POST[password]'";
		$result = $database->query($sql);
		if($row = mysqli_fetch_array($result)){
			$_SESSION['username'] = $_POST['username'];
			echo "Login";
		}
		$database->disconnect();
	}
?>