<?php
	class EventController extends \BaseController {
		public function getEventDetail($eventid) {
			$eventDetail = DB::table("events")->where("eventid",$eventid)->first();
			
			if($eventDetail) {
				return Response::json($eventDetail);
			}
			else {
				return Response::json_encode('Failed');
			}
		}
		
		public function addNewEvent() {
			$recieved_data = Input::all();
			$author = Session::all();
			$insert_array = array(
					'author'			=>		$author['username'],
					'eventname'			=>		$recieved_data['eventname'],
					'description'		=>		$recieved_data['description'],
					'rules'				=>		$recieved_data['rules'],
					'coordinator1'		=>		$recieved_data['coordinator1'],
					'phone1'			=>		$recieved_data['phone1'],
					'coordinator2'		=>		$recieved_data['coordinator2'],
					'phone2'			=>		$recieved_data['phone2'],
					'coordinator3'		=>		$recieved_data['coordinator3'],
					'phone3'			=>		$recieved_data['phone3'],
					'coordinator4'		=>		$recieved_data['coordinator4'],
					'phone4'			=>		$recieved_data['phone4'],
					'category'			=>		$recieved_data['category'],
					'time'				=>		$recieved_data['time'],
					'venue'				=>		$recieved_data['venue']
	    	);
	
			if($recieved_data['eventstatus'] == 'newEvent')
				$flag = DB::table('events')->insert($insert_array);
			
			else {
				$flag=DB::table('events')->where("eventid",$recieved_data['eventstatus'])->update($insert_array);
			}


			if($flag==1)
				echo json_encode("Entered");
			else
				echo json_encode("Can't be added");
		}
		
		
		public function deleteEvent($eventid) {
			$status = DB::table('events')->where('eventid',$eventid)->delete();
			echo $status;
		}
		
		public function getEventList() {
			$author = Session::all(); 
			$eventList = DB::table('events')->where('author',$author['username'])->lists('eventname','eventid');
			echo json_encode($eventList);
			
		}
	}


?>
