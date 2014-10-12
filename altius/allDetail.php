<?php
$con=mysqli_connect("localhost","root","gonnarock**##","altius");
if (mysqli_connect_errno()) {
		echo "Problem with database connectivity";
		}


	if ($_SERVER["REQUEST_METHOD"] == "GET")
		{
			//echo "dddd";
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
			}
			$result = mysqli_query($con,"SELECT * FROM events WHERE eventid = '$id'");
			if($result)
			{
				//echo "success ";
			}
			else
			{
				echo "failed ";
			}
			$a = array();
			$count = mysqli_fetch_array($result);
			for($i = 0;$i < 16; $i++)
			{
				$temp = utf8_encode($count[$i]);
				array_push($a, $temp);
			}
			$json = array(
				'eventid' => $a[0],
				'author'  => $a[1],
				'eventname' => $a[2],
				'description' => $a[3],
				'time' => $a[4],
				'venues' => $a[5],
				'rules' => $a[6],
				'coordinator1' => $a[7],
				'phone1' => $a[8],
				'coordinator2' => $a[9],
				'phone2' => $a[10],
				'coordinator3' => $a[11],
				'phone3' => $a[12],
				'coordinator4' => $a[13],
				'phone4' => $a[14],
				 'category' => $a[15]
				);
			echo json_encode($json);
			
		}

?>