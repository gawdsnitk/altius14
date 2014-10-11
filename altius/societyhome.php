<!DOCTYPE html>
	<head>
		<title>Altius 2014</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/master.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid" >
			<div class="row">
				<div class = "navbar navbar-fixed-top" role = "navigation">
					<a class = "btn btn-primary pull-right" style="margin:2% 2% 0 0"href="http://178.62.27.102/altius/laravel/public/logout">Logout</a>
				</div>
			
				 <div id="eventList" class="col-xs-3 col-md-3 eventList pull-left" style="margin-top:5%">                       
                           <button type="button" onclick="addNewEvent()" class="col-md-10 btn btn-default addNewEvent">
				<i class="glyphicon glyphicon-plus"></i> Add New Event</button>
                                </div> 
	
				<div id="eventdetail" class="col-md-9 col-sm-9 eventDetail" >
					
				</div>
				
				<div id="cover" class="col-md-offset-3 col-md-9 cover" style="position:absolute">
					<div class="row">
						<div class="col-md-offset-4 " style="font-size:50px">Welcome <div id="author"> </div></div>
					</div>
					
				</div>
				<div id="popup" class="col-md-offset-6 col-md-3 popup" style="position:fixed; ">
					
					<button type="button" class="btn btn-default col-md-offset-1 col-md-4" style="top:30%" value="Delete" onclick="deleteEvent()">Delete</button>
					<button type="button" class="btn btn-default col-md-offset-2 col-md-4" style="top:30%" value="Update" onclick="updateEvent()">Update</button> 
				</div>

			</div>
		</div>
	</body>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script>
	$(document).ready(appendEventList());
	function appendEventList() {
		$('#eventdetail').load('EventUI.html');
		$.ajax({
			type		:	"GET",
			url			:	"laravel/public/geteventlist",
			success		:	function(eventList) {
								var eid;
								
								var a  = JSON.parse(eventList,function(id,name){
									console.log(id + " : "+name);
									$('#eventList').append('<div class="row"><div id="event'+ id+'"onclick="popup('+ id +')" class="col-md-10 col-sm-10 btn eventname">'+ name +'</div></div>');
									eid = id;
								});
								$('#event'+eid).css({'visibility':'hidden'});
							}
		});
	
	}
	
	
	var eventid;
	function popup(id,eventname) {
		eventid = id;
		$('#popup').css({'visibility':'visible'});
		$('#cover').css({'visibility':'visible'});
	}
	function deleteEvent() {
		$.ajax({
			type		:		"GET",
			url			:		"laravel/public/delevent/" + eventid,
			success		:		function(status) {
									if(status == '1') {
										alert("Event Deleted");
										location.replace('societyhome.php');
									}
									else {
										alert("Cant Delete the event");
									}
								}
		
		});
	}
	function addNewEvent() {
		
		
		$('#popup').css({'visibility':'hidden'});
		$('#eventdetail').css({'visibility':'visible'});
		$('#cover').css({'visibility':'hidden'});
		$('#eventstatus').val("newEvent");
	}
	function updateEvent() {
		$.ajax({
			type		:		"GET",
			url			:		"laravel/public/eventdetail/"+eventid,
			success		:		function(eventdetail) {
									$('#popup').css({'visibility':'hidden'});
									$('#eventdetail').css({'visibility':'visible'});
									$('#cover').css({'visibility':'hidden'});
									document.getElementById('eventstatus').defaultValue 		= 	eventid;
									document.getElementById('eventName').defaultValue 			= 	eventdetail['eventname'] ;
									$('#eventdescription').val(eventdetail['description']); ;
									$('#eventRules').val(eventdetail['rules']); ;
									document.getElementById('time').defaultValue 				=	eventdetail['time'] ;
									document.getElementById('coordinator1').defaultValue 		= 	eventdetail['coordinator1'] ;
									document.getElementById('coordinator2').defaultValue 		= 	eventdetail['coordinator2'] ;
									document.getElementById('coordinator3').defaultValue 		= 	eventdetail['coordinator3'] ;
									document.getElementById('coordinator4').defaultValue 		= 	eventdetail['coordinator4'] ;
									document.getElementById('phone1').defaultValue 				= 	eventdetail['phone1'] ;
									document.getElementById('phone2').defaultValue 				= 	eventdetail['phone2'] ;
									document.getElementById('phone3').defaultValue 				= 	eventdetail['phone3'] ;
									document.getElementById('phone4').defaultValue 				= 	eventdetail['phone4'] ;
									document.getElementById('venueName').defaultValue 			= 	eventdetail['venue'] ;
									document.getElementById('category').defaultValue 			= 	eventdetail['category'] ;
								}
		});
	}
	
	</script>
</html>
