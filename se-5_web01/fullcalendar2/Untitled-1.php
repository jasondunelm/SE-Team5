<?php
require_once('bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />
    
    <link href='fullcalendar/css/core.css' rel='stylesheet' />
    <link href='fullcalendar/css/daygrid.css' rel='stylesheet' />
    <link href='fullcalendar/css/timegrid.css' rel='stylesheet' />
    <link href='fullcalendar/css/list.css' rel='stylesheet' />
    <script src='fullcalendar/js/core.js'></script>
    <script src='fullcalendar/js/interation.js'></script>
    <script src='fullcalendar/js/daygrid.js'></script>
    <script src='fullcalendar/js/timegrid.js'></script>
    <script src='fullcalendar/js/list.js'></script>


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Free Calendar</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Menu</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>FullCalendar BS3 PHP MySQL</h1>
                <p class="lead">Complete with pre-defined file paths that you won't have to change!</p>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalWeekday" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" onsubmit="return checkTime()" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Facility</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Squash courts</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Aerobics room</option>
						  <option style="color:#008000;" value="#008000">&#9724; Tennis</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Athletics track</option>
						  <!--option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option-->
						  <!--option style="color:#FF0000;" value="#FF0000">&#9724; Red</option-->
						  <!--option style="color:#000;" value="#000">&#9724; Black</option-->
						  
						</select>
					</div>
				  </div>
                  <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Date</label>
					<div class="col-sm-10">
					  <input type="text" name="startDate" class="form-control" id="startDate" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="startTime" class="col-sm-2 control-label">Start time</label>
					<div class="col-sm-10">
					  <select name="startTime" class="form-control" id="startTime">
                          <option value="">Choose</option>
                          <option>7:00</option>
                          <option>7:30</option>
						  <option>8:00</option>
                          <option>8:30</option>
						  <option>9:00</option>
                          <option>9:30</option>
                          <option>10:00</option>
                          <option>10:30</option>
                          <option>11:00</option>
                          <option>11:30</option>
                          <option>12:00</option>
                          <option>12:30</option>
                          <option>13:00</option>
                          <option>13:30</option>
                          <option>14:00</option>
                          <option>14:30</option>
                          <option>15:00</option>
                          <option>15:30</option>
                          <option>16:00</option>
                          <option>16:30</option>
                          <option>17:00</option>
                          <option>17:30</option>
                          <option>18:00</option>
                          <option>18:30</option>
                          <option>19:00</option>
                          <option>19:30</option>
                          <option>20:00</option>
                          <option>20:30</option>
                          <option>21:00</option>
                          <option>21:30</option>
                      </select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="endTime" class="col-sm-2 control-label">End time</label>
					<div class="col-sm-10">
					  <select name="endTime" class="form-control" id="endTime">
                          <option value="">Choose</option>
                          <option>7:30</option>
						  <option>8:00</option>
                          <option>8:30</option>
						  <option>9:00</option>
                          <option>9:30</option>
                          <option>10:00</option>
                          <option>10:30</option>
                          <option>11:00</option>
                          <option>11:30</option>
                          <option>12:00</option>
                          <option>12:30</option>
                          <option>13:00</option>
                          <option>13:30</option>
                          <option>14:00</option>
                          <option>14:30</option>
                          <option>15:00</option>
                          <option>15:30</option>
                          <option>16:00</option>
                          <option>16:30</option>
                          <option>17:00</option>
                          <option>17:30</option>
                          <option>18:00</option>
                          <option>18:30</option>
                          <option>19:00</option>
                          <option>19:30</option>
                          <option>20:00</option>
                          <option>20:30</option>
                          <option>21:00</option>
                          <option>21:30</option>
                          <option>22:00</option>
                      </select>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
        <div class="modal fade" id="ModalWeekend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" onsubmit="return checkTime()" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Facility</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Squash courts</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Aerobics room</option>
						  <option style="color:#008000;" value="#008000">&#9724; Tennis</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Athletics track</option>
						  <!--option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option-->
						  <!--option style="color:#FF0000;" value="#FF0000">&#9724; Red</option-->
						  <!--option style="color:#000;" value="#000">&#9724; Black</option-->
						  
						</select>
					</div>
				  </div>
                  <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Date</label>
					<div class="col-sm-10">
					  <input type="text" name="startDate" class="form-control" id="startDate" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="startTime" class="col-sm-2 control-label">Start time</label>
					<div class="col-sm-10">
					  <select name="startTime" class="form-control" id="startTime">
                          <option value="">Choose</option>
						  <option>9:00</option>
                          <option>9:30</option>
                          <option>10:00</option>
                          <option>10:30</option>
                          <option>11:00</option>
                          <option>11:30</option>
                          <option>12:00</option>
                          <option>12:30</option>
                          <option>13:00</option>
                          <option>13:30</option>
                          <option>14:00</option>
                          <option>14:30</option>
                          <option>15:00</option>
                          <option>15:30</option>
                          <option>16:00</option>
                          <option>16:30</option>
                          <option>17:00</option>
                          <option>17:30</option>
                      </select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="endTime" class="col-sm-2 control-label">End time</label>
					<div class="col-sm-10">
					  <select name="endTime" class="form-control" id="endTime">
                          <option value="">Choose</option>
                          <option>9:30</option>
                          <option>10:00</option>
                          <option>10:30</option>
                          <option>11:00</option>
                          <option>11:30</option>
                          <option>12:00</option>
                          <option>12:30</option>
                          <option>13:00</option>
                          <option>13:30</option>
                          <option>14:00</option>
                          <option>14:30</option>
                          <option>15:00</option>
                          <option>15:30</option>
                          <option>16:00</option>
                          <option>16:30</option>
                          <option>17:00</option>
                          <option>17:30</option>
                          <option>18:00</option>
                      </select>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		<!--div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div-->
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	
	<script>
        function checkTime(){
            var starttime = $("select[name='startTime']").val();
            var endtime = $("select[name='endTime']").val();
            if(starttime==endtime){
                alert("start time cannot be identical to end time");
                return false;
            }
            var starttimeArray = starttime.split(":");
            var endtimeArray = endtime.split(":");
            if(parseInt(starttimeArray[0])>parseInt(endtimeArray[0])||(parseInt(starttimeArray[0])==parseInt(endtimeArray[0])&&parseInt(starttimeArray[1])>parseInt(endtimeArray[1]))){
                alert("start time should be eariler than end time");
                return false;
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
          navLinks: true, // can click day/week names to navigate views
          businessHours: true, // display business hours
          editable: true
        ,
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        selectHelper: true,
        select: function(start, end) {
            if(start.start.getDay()==0||start.start.getDay()==6){
                $('#ModalWeekend #startDate').val(start.startStr);
                $('#ModalWeekend #endDate').val(start.endStr+' 00:00:00');
                $('#ModalWeekend').modal('show');
            }
            else{
                $('#ModalWeekday #startDate').val(start.startStr);
                $('#ModalWeekday #endDate').val(start.endStr+' 00:00:00');
                $('#ModalWeekday').modal('show');
            }
        },
        eventRender: function(event, element) {
            /*element.bind('dblclick', function() {
                //$('#ModalEdit #id').val(event.id);
                //$('#ModalEdit #title').val(event.title);
                //$('#ModalEdit #color').val(event.color);
                //$('#ModalEdit').modal('show');
            });*/
        },
        eventDrop: function(event, delta, revertFunc) { // si changement de position

            edit(event);

        },
        eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

            edit(event);

        }
        
            
      ,events: [
        /*{
          title: 'Business Lunch',
          start: '2019-04-03T13:00:00',
          constraint: 'businessHours'
        },*/
        /*{
          title: 'Meeting',
          start: '2019-04-13T11:00:00',
          constraint: 'availableForMeeting', // defined below
          color: '#257e4a'
        },*/
        {
            id: 54,
          title: 'Conference',
          start: '2019-04-18',
          end: '2019-04-20',
            color: '#257e4a'
        },
        {
            id: 55,
          title: 'Party',
          start: '2019-04-29T20:00:00'
        },

        // areas where "Meeting" must be dropped
        /*{
          groupId: 'availableForMeeting',
          start: '2019-04-11T10:00:00',
          end: '2019-04-11T16:00:00',
          rendering: 'background'
        },
        {
          groupId: 'availableForMeeting',
          start: '2019-04-13T10:00:00',
          end: '2019-04-13T16:00:00',
          rendering: 'background'
        },*/

        // red areas where no events can be dropped
        {
            id: 56,
          start: '2019-04-24',
          end: '2019-04-28',
          overlap: false,
          rendering: 'background',
          color: '#ff9f89'
        },
        {
            id: 57,
          start: '2019-04-06',
          end: '2019-04-08',
          overlap: false,
          rendering: 'background',
          color: '#ff9f89'
        }
          ,<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
                    id: <?php echo $event['id']; ?>,
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>'
				},
			<?php endforeach; ?>
      ]
    });
            function edit(event){
                var startobject = event.event.start;
                start = startobject.getFullYear() + "-" + ("0"+(startobject.getMonth()+1)).slice(-2) + "-" + ("0" + startobject.getDate()).slice(-2) + " " + ("0" + startobject.getHours()).slice(-2) + ":" + ("0" + startobject.getMinutes()).slice(-2)+ ":" + ("0" + startobject.getSeconds()).slice(-2);
                var endobject = event.event.end;
                
			//start = event.event.start.format('YYYY-MM-DD HH:mm:ss');
			//if(event.event.end){
                end = endobject.getFullYear() + "-" + ("0"+(endobject.getMonth()+1)).slice(-2) + "-" + ("0" + endobject.getDate()).slice(-2) + " " + ("0" + endobject.getHours()).slice(-2) + ":" + ("0" + endobject.getMinutes()).slice(-2)+ ":" + ("0" + endobject.getSeconds()).slice(-2);
				//end = event.end.format('YYYY-MM-DD HH:mm:ss');
			//}else{
			//	end = start;
			//}
			//console.log(start);
            //console.log(end);
			id =  event.event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
            

    calendar.render();
  });
	/*$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			//defaultDate: '2016-01-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
                console.log(moment(start).format('YYYY-MM-DD HH:mm:ss'));
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<!--?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<!--?php echo $event['id']; ?>',
					title: '<!--?php echo $event['title']; ?>',
					start: '<!--?php echo $start; ?>',
					end: '<!--?php echo $end; ?>',
					color: '<!--?php echo $event['color']; ?>',
				},
			<!--?php endforeach; ?>
			]
		});
		
		function edit(event){
            console.log(event);
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
                        alert(Event);
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
	});*/

</script>

</body>

</html>