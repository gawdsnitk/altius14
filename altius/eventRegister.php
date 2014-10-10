<?php
	require_once("database.php");
	session_start();
		//echo json_encode($_POST['category']);
	$sql = "INSERT INTO events(author,eventname,description,rules,coordinator1,phone1,coordinator2,phone2,coordinator3,phone3,coordinator4,
			phone4,category,time,venue) 
			VALUES
			('$_SESSION[username]','$_POST[eventname]','$_POST[description]','$_POST[rules]','$_POST[coordinator1]','$_POST[phone1]'
			,'$_POST[coordinator2]','$_POST[phone2]','$_POST[coordinator3]','$_POST[phone3]','$_POST[coordinator4]','$_POST[phone4]'
			,'$_POST[category]','$_POST[time]','$_POST[venue]')";
	$result = $database->query($sql);
	if(!$result) {
		echo json_encode("Event Cant Be Added...TRY AGAIN");
	}
	else {
		echo json_encode("Event Added... :-)");
	}
?>	