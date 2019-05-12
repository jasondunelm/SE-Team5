<?php
session_start();
$_SESSION['userName']="tzu-chiao.wang2@durham.ac.uk";
require_once('bdd.php');

$sql = "SELECT nbooking.ID, UserID, FacilityID, StartTime, EndTime, block, Color FROM
        (SELECT * FROM booking) AS nbooking
        LEFT JOIN
        (SELECT ID, Color FROM facility) AS nfacility 
        on nbooking.FacilityID=nfacility.ID ";

$req = $bdd->prepare($sql);
$req->execute();

$bookings = $req->fetchAll();

$sql = "SELECT ID, Name, Color, Capacity, UnitPrice FROM facility ";

$req = $bdd->prepare($sql);
$req->execute();

$facilities = $req->fetchAll();

$facilitiesPrice = array(); 

foreach ($facilities as $row) {
    $facilitiesPrice[] = array($row["ID"], $row["UnitPrice"]);
}

$userName=$_SESSION['userName'];
$sql = "SELECT `User ID` FROM user WHERE Username= '$userName'";

$req = $bdd->prepare($sql);
$req->execute();

$userIDs = $req->fetch();
$userID = $userIDs[0];
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="../text/css" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="SE-5">
    <meta name="description" content="A online application software for DUS">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- <link rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
<!--    <link href="/fullcalendar/css/bootstrap.min.css" rel="stylesheet">-->
	
	 
<!--	<link href='/fullcalendar/css/fullcalendar.css' rel='stylesheet' />-->
    
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
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
        
    .navbar{
    background-color: #742e68 !important;
}
.navbar .navbar-brand{
    color: #fff;

}
.navbar .navbar-brand:hover{
    color: #fff;
}
.navbar .navbar-nav li a {
    color: #fff !important;
}

.navbar .nav-item .dropdown-menu .dropdown-item{
    color: #000 !important;
}

.navbar .nav-item .dropdown-menu .dropdown-item:hover{
    color: #fff !important;
    background-color: black;
    opacity: 0.5;
}
        
.btn-outline-success:hover{
    background-color: #742e68;
}
    .btn{
    color: white;
    border-style: hidden;
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
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <img src="../images/small_logo.png">&nbsp;&nbsp;
    <a class="navbar-brand" href="https://www.teamdurham.com">DUS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon bg-transparent"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../events.php">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.teamdurham.com/queenscampus/">Queen's Campus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../fullcalendar2/index.php">Booking</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Facilities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../facility.php?facilityName=Fitness Suite">Fitness Suite</a>
                    <a class="dropdown-item" href="../sportsHall.php">Sports Hall</a>
                    <a class="dropdown-item" href="../facility.php?facilityName=Artificial Pitches">Artificial Pitches</a>
                    <a class="dropdown-item" href="../facility.php?facilityName=Rowing Tank">Rowing Tank</a>
                    <a class="dropdown-item" href="../facility.php?facilityName=Ergo Gallery">Ergo Gallery</a>
                    <a class="dropdown-item" href="../outdoorFacilities.php">Outdoor Facilities</a>
                    <a class="dropdown-item" href="../facility.php?facilityName=Maiden Castle Physiotherapy">Maiden Castle Physiotherapy</a>
                    <a class="dropdown-item" href="../facility.php?facilityName=Aerobics Room">Aerobics Room</a>

                    <!--
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>-->
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Other Information
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="openTime.php">Open time</a>
                    <a class="dropdown-item" href="cater.php">Catering</a>
                    <a class="dropdown-item" href="https://www.accessable.co.uk">Access Information</a>

                </div>
            </li>


        </ul>
        <form class="form-inline my-2 my-lg-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <!--  class="btn btn-outline-success my-2 my-sm-0" -->
            </div>
        </form>

        <ul class="navbar-nav mr-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Accounts
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./login.php">Login</a>
                    <a class="dropdown-item" href="./register.php">Sign up</a>
                </div>
            </li>
        </ul>
    </div>
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
			<form class="form-horizontal" id="formWeekday" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <!--div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div-->
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Facility</label>
					<div class="col-sm-10">
					  <select name="facility" class="form-control" id="facilityWeekday">
						  <option value="">Choose</option>
                          <?php 
                          foreach($facilities as $facility): 
                            echo "<option style='color:".$facility['Color']."' value=".$facility['ID'].">&#9724; ".$facility['Name']."</option>";
                          endforeach;
                          ?>
						</select>
					</div>
				  </div>
                  <div class="form-group">
					<label for="user" class="col-sm-2 control-label">UserID</label>
					<div class="col-sm-10">
					  <input type="text" name="user" class="form-control" id="userWeekday" value="<?php echo $userID;?>" readonly>
					</div>
				  </div>
                  <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Date</label>
					<div class="col-sm-10">
					  <input type="text" name="startDate" class="form-control" id="startDateWeekday" readonly>
					</div>
				  </div>
                  <input type="hidden" id="endDateWeekday" name="custId">
				  <div class="form-group">
					<label for="startTime" class="col-sm-2 control-label">Start time</label>
					<div class="col-sm-10">
					  <select name="startTime" class="form-control" id="startTimeWeekday">
                          <option value="">Choose</option>
                          <option>7:00</option>
						  <option>8:00</option>
						  <option>9:00</option>
                          <option>10:00</option>
                          <option>11:00</option>
                          <option>12:00</option>
                          <option>13:00</option>
                          <option>14:00</option>
                          <option>15:00</option>
                          <option>16:00</option>
                          <option>17:00</option>
                          <option>18:00</option>
                          <option>19:00</option>
                          <option>20:00</option>
                          <option>21:00</option>
                      </select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="endTime" class="col-sm-2 control-label">End time</label>
					<div class="col-sm-10">
					  <select name="endTime" class="form-control" id="endTimeWeekday">
                          <option value="">Choose</option>
						  <option>8:00</option>
						  <option>9:00</option>
                          <option>10:00</option>
                          <option>11:00</option>
                          <option>12:00</option>
                          <option>13:00</option>
                          <option>14:00</option>
                          <option>15:00</option>
                          <option>16:00</option>
                          <option>17:00</option>
                          <option>18:00</option>
                          <option>19:00</option>
                          <option>20:00</option>
                          <option>21:00</option>
                          <option>22:00</option>
                      </select>
					</div>
				  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Unit Price</label>
                    <div class="col-sm-10">
                        <span>£</span><span id="moneyWeekday"></span>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="totalmoney" class="col-sm-2 control-label">Total Price</label>
                    <div class="col-sm-10">
                        <input type="text" name="totalmoney" class="form-control" id="totalmoneyWeekday" readonly>
                        <!--span>£</span><span id="totalmoney"></span-->
                    </div>
                </div>
			  </div>
                
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnWeekday">Save changes</button>
			  </div>
			</form>
                
			</div>
		  </div>
		</div>
        <!-- Modal -->
        <div class="modal fade" id="ModalWeekend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" id="formWeekend" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <!--div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div-->
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Facility</label>
					<div class="col-sm-10">
					  <select name="facility" class="form-control" id="facilityWeekend">
						  <option value="">Choose</option>
                          <?php 
                          foreach($facilities as $facility): 
                            echo "<option style='color:".$facility['Color']."' value=".$facility['ID'].">&#9724; ".$facility['Name']."</option>";
                          endforeach;
                          ?>
						</select>
					</div>
				  </div>
                  <div class="form-group">
					<label for="user" class="col-sm-2 control-label">UserID</label>
					<div class="col-sm-10">
					  <input type="text" name="user" class="form-control" id="userWeekend" value="<?php echo $userID;?>" readonly>
					</div>
				  </div>
                  <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Date</label>
					<div class="col-sm-10">
					  <input type="text" name="startDate" class="form-control" id="startDateWeekend" readonly>
					</div>
				  </div>
                  <input type="hidden" id="endDateWeekend" name="custId">
				  <div class="form-group">
					<label for="startTime" class="col-sm-2 control-label">Start time</label>
					<div class="col-sm-10">
					  <select name="startTime" class="form-control" id="startTimeWeekend">
                          <option value="">Choose</option>
						  <option>9:00</option>
                          <option>10:00</option>
                          <option>11:00</option>
                          <option>12:00</option>
                          <option>13:00</option>
                          <option>14:00</option>
                          <option>15:00</option>
                          <option>16:00</option>
                          <option>17:00</option>
                      </select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="endTime" class="col-sm-2 control-label">End time</label>
					<div class="col-sm-10">
					  <select name="endTime" class="form-control" id="endTimeWeekend">
                          <option value="">Choose</option>
                          <option>10:00</option>
                          <option>11:00</option>
                          <option>12:00</option>
                          <option>13:00</option>
                          <option>14:00</option>
                          <option>15:00</option>
                          <option>16:00</option>
                          <option>17:00</option>
                          <option>18:00</option>
                      </select>
					</div>
				  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Unit Price</label>
                    <div class="col-sm-10">
                        <span>£</span><span id="moneyWeekend"></span>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="totalmoney" class="col-sm-2 control-label">Total Price</label>
                    <div class="col-sm-10">
                        <input type="text" name="totalmoney" class="form-control" id="totalmoneyWeekend" readonly>
                        <!--span>£</span><span id="totalmoney"></span-->
                    </div>
                </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnWeekend">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

          <!--option value="">Choose</option>
          <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
          <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
          <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
          <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
          <option style="color:#000;" value="#000">&#9724; Black</option-->
		
		
		<!-- Modal -->
		<!--div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
					<label for="facility" class="col-sm-2 control-label">Facility</label>
					<div class="col-sm-10">
					  <select name="facility" class="form-control" id="facility">
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
		</div-->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
                <h1 style="margin-left: 20px;">Do you want to remove the event?</h1>
                <h4><span style="margin-left: 20px;">Event ID: </span><span id="h1AddID"></span></h4>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id="btnAdd">Confirm</button>
			  </div>
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
        <?php
        $myJSON = json_encode($facilitiesPrice);
        echo "var facilitiesPrice = ".$myJSON.";";
        ?>

        $("#facilityWeekday, #endTimeWeekday, #startTimeWeekday").change(function() {
            if($("#facilityWeekday").val()=="4"){
                $('#startTimeWeekday').prop('disabled', true);
                $('#endTimeWeekday').prop('disabled', true);
                var facilitychosen = Number($("#facilityWeekday").val());
                $("#moneyWeekday").text(facilitiesPrice[facilitychosen-1][1]);
                $("#totalmoneyWeekday").val(facilitiesPrice[facilitychosen-1][1]);
            }
            else if($("#facilityWeekday").val()!=""){
                $('#startTimeWeekday').prop('disabled', false);
                $('#endTimeWeekday').prop('disabled', false);
                var facilitychosen = Number($("#facilityWeekday").val());
                $("#moneyWeekday").text(facilitiesPrice[facilitychosen-1][1]);
            }
            else{
                $('#startTimeWeekday').prop('disabled', false);
                $('#endTimeWeekday').prop('disabled', false);
                $("#moneyWeekday").text("");
            }
                
            
            if($("#facilityWeekday").val()!=""  && $("#startTimeWeekday").val()!="" && $("#endTimeWeekday").val()!=""){
                var facilitychosen = Number($("#facilityWeekday").val());
                var startTimeWeekday = $("#startTimeWeekday").val();
                var endTimeWeekday = $("#endTimeWeekday").val();
                var startarray = startTimeWeekday.split(":");
                var endarray = endTimeWeekday.split(":");
                $("#totalmoneyWeekday").val(   Number(facilitiesPrice[facilitychosen-1][1])*(Number(endarray[0])-Number(startarray[0] ))     );
            }
        });
        $("#facilityWeekend, #endTimeWeekend, #startTimeWeekend").change(function() {
            if($("#facilityWeekend").val()=="4"){
                $('#startTimeWeekend').prop('disabled', true);
                $('#endTimeWeekend').prop('disabled', true);
                var facilitychosen = Number($("#facilityWeekend").val());
                $("#moneyWeekend").text(facilitiesPrice[facilitychosen-1][1]);
                $("#totalmoneyWeekend").val(facilitiesPrice[facilitychosen-1][1]);
            }
            else if($("#facilityWeekend").val()!=""){
                $('#startTimeWeekend').prop('disabled', false);
                $('#endTimeWeekend').prop('disabled', false);
                var facilitychosen = Number($("#facilityWeekend").val());
                $("#moneyWeekend").text(facilitiesPrice[facilitychosen-1][1]);
            }
            else{
                $('#startTimeWeekend').prop('disabled', false);
                $('#endTimeWeekend').prop('disabled', false);
                $("#moneyWeekend").text("");
            }
            if($("#facilityWeekend").val()!=""  && $("#startTimeWeekend").val()!="" && $("#endTimeWeekend").val()!=""){
                var facilitychosen = Number($("#facilityWeekend").val());
                var startTimeWeekend = $("#startTimeWeekend").val();
                var endTimeWeekend = $("#endTimeWeekend").val();
                var startarray = startTimeWeekend.split(":");
                var endarray = endTimeWeekend.split(":");
                $("#totalmoneyWeekend").val(   Number(facilitiesPrice[facilitychosen-1][1])*(Number(endarray[0])-Number(startarray[0] ))     );
            }
        });
        $("#btnWeekday").click(checkTimeWeekday);
        function checkTimeWeekday(){
            var starttime = $("select#startTimeWeekday").val();
            var endtime = $("select#endTimeWeekday").val();
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
            beingblockedWeekday();
        }
        function beingblockedWeekday(){
            var date = $("input#startDateWeekday").val();
            var starttime = $("select#startTimeWeekday").val();
            var endtime = $("select#endTimeWeekday").val();
            var chosenfacility = $("select#facilityWeekday").val();
            $.ajax({
                url: 'checkEventOverlap.php',
                type: "POST",
                data: {date, starttime,endtime,chosenfacility},
                success: function(rep) {
                    if(rep == 'OK'){
                        $( "form#formWeekday" ).submit();
                    }else{
                        alert(rep);
                    }
                }
            });
        }
        
        $("#btnWeekend").click(checkTimeWeekend);
        function checkTimeWeekend(){
            var starttime = $("select#startTimeWeekend").val();
            var endtime = $("select#endTimeWeekend").val();
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
            beingblockedWeekend();
        }
        function beingblockedWeekend(){
            var date = $("input#startDateWeekend").val();
            var starttime = $("select#startTimeWeekend").val();
            var endtime = $("select#endTimeWeekend").val();
            var chosenfacility = $("select#facilityWeekend").val();
            $.ajax({
                url: 'checkEventOverlap.php',
                type: "POST",
                data: {date, starttime,endtime,chosenfacility},
                success: function(rep) {
                    if(rep == 'OK'){
                        $( "form#formWeekend" ).submit();
                    }else{
                        alert(rep);
                    }
                }
            });
        }
        
        
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                header: {
                    left: 'prev,next, today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                //editable: true,
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    if(start.start.getDay()==0||start.start.getDay()==6){
                        $('#ModalWeekend #startDateWeekend').val(start.startStr);
                        $('#ModalWeekend #endDateWeekend').val(start.endStr+' 00:00:00');
                        $('#ModalWeekend').modal('show');
                    }
                    else{
                        $('#ModalWeekday #startDateWeekday').val(start.startStr);
                        $('#ModalWeekday #endDateWeekday').val(start.endStr+' 00:00:00');
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
                /*eventDrop: function(event, delta, revertFunc) { // si changement de position

                    edit(event);

                },*/
                /*eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                    edit(event);

                },*/
                eventClick: function(info) {
                    $('#h1AddID').text(info.event.id);
                    $('#ModalAdd').modal('show');
                },
                /*eventOverlap: function(stillEvent, movingEvent) {
                    console.log(stillEvent);
                },*/




                events: [
                    <?php foreach($bookings as $booking): 

                        $start = explode(" ", $booking['StartTime']);
                        $end = explode(" ", $booking['EndTime']);
                        if($start[1] == '00:00:00'){
                            $start = $start[0];
                        }else{
                            $start = $booking['StartTime'];
                        }
                        if($end[1] == '00:00:00'){
                            $end = $end[0];
                        }else{
                            $end = $booking['EndTime'];
                        }
                    ?>
                    {
                        id: <?php echo $booking['ID']; ?>,
                        start: '<?php echo $start; ?>',
                        end: '<?php echo $end; ?>',
                        color: '<?php echo $booking['Color']; ?>'
                        <?php
                        if($booking['block']==1){
                            echo ", rendering: 'background', overlap: false";
                        }
                        ?>
                    },
                    <?php endforeach; ?>
                ]
            });
            $( "#btnAdd" ).click(function() {
                remove($('#h1AddID').text());
            });
            /*function edit(event){
                    var startobject = event.event.start;
                    start = startobject.getFullYear() + "-" + ("0"+(startobject.getMonth()+1)).slice(-2) + "-" + ("0" + startobject.getDate()).slice(-2) + " " + ("0" + startobject.getHours()).slice(-2) + ":" + ("0" + startobject.getMinutes()).slice(-2)+ ":" + ("0" + startobject.getSeconds()).slice(-2);
                    var endobject = event.event.end;

                    end = endobject.getFullYear() + "-" + ("0"+(endobject.getMonth()+1)).slice(-2) + "-" + ("0" + endobject.getDate()).slice(-2) + " " + ("0" + endobject.getHours()).slice(-2) + ":" + ("0" + endobject.getMinutes()).slice(-2)+ ":" + ("0" + endobject.getSeconds()).slice(-2);
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
            }*/
            function remove(evtID){
                var evt = calendar.getEventById(evtID);
                evt.remove();
                $.ajax({
                 url: 'rmvEvent.php',
                 type: "POST",
                 data: {evtID},
                 success: function(rep) {
                        if(rep == 'OK'){
                            alert('Saved');
                        }else{
                            alert('Could not be saved. try again.'); 
                        }
                    }
                });
                $('#ModalAdd').modal('hide');
            }


            calendar.render();
        });
    </script>
    
 <?php
include('../footer.php');
?>
</body>

</html>