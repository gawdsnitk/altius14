<?php
$con=mysqli_connect("localhost","root","gonnarock**##","altius");
if (mysqli_connect_errno()) {
		echo "Problem with database connectivity";
		}


	if ($_SERVER["REQUEST_METHOD"] == "GET")
		{
			//echo "dddd";
			if(isset($_GET['society']))
			{
				$society = $_GET['society'];
			}
			$result = mysqli_query($con,"SELECT eventid,eventname FROM events WHERE author = '$society'");
			if($result)
			{
				//echo "success ";
			}
			else
			{
				echo "failed ";
			}
			$a = array();
			//$count = mysqli_fetch_array($result)
			//echo json_encode($count);
			while($count = mysqli_fetch_array($result))
			{
				$a[] = $count;// 	echo json_encode($count);
				//array_push($a,$count);
			}
			echo json_encode($a);
		}

?>
