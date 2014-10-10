<?php
	require_once("database.php");
	$sql="INSERT INTO users (username,password,society)
		VALUES
		('$_POST[username]','$_POST[password]','$_POST[society]')";

	if (!($database->query($sql)))	{
		die('Error: ' . mysqli_error($con));
	}
	else
		header("Location:http://localhost/altius/EventUI.html");
	$database->disconnect();
?> 