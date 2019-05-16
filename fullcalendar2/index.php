<?php
session_start();
$_SESSION['userName']="tuohao11@gmail.com";
$_SESSION['userName']="tuo.hao@durham.ac.uk";
require_once('bdd.php');

$sql = "SELECT nbooking.ID, UserID, FacilityID, facilityName AS Name, StartTime, EndTime, block, Color FROM
        (SELECT * FROM booking) AS nbooking
        LEFT JOIN
        (SELECT ID, facilityName, Color FROM facility) AS nfacility 
        on nbooking.FacilityID=nfacility.ID ";

$req = $bdd->prepare($sql);
$req->execute();

$bookings = $req->fetchAll();

$blocks = array(); 

foreach ($bookings as $row) {
    if($row["block"]==1)
        $blocks[] = array($row["ID"], $row["Name"], $row["StartTime"], $row["EndTime"]);
}

$sql = "SELECT ID, facilityName AS Name, Color, Capacity, UnitPrice FROM facility WHERE ID<>0";

$req = $bdd->prepare($sql);
$req->execute();

$facilities = $req->fetchAll();

$facilitiesPrice = array(); 

foreach ($facilities as $row) {
    $facilitiesPrice[] = array($row["ID"], $row["UnitPrice"]);
}

$userName=$_SESSION['userName'];
$sql = "SELECT `ID`, `Username`, `Role` FROM users WHERE Username= '$userName'";

$req = $bdd->prepare($sql);
$req->execute();

$loginUser = $req->fetch();
$userID = $loginUser["ID"];
$userName = $loginUser["Username"]; 
$userRole = $loginUser["Role"]; // This is where the admin and the trainer is declared.

$sql = "SELECT `ID`, `Username`, `Firstname`, `Lastname` FROM `users` WHERE 1";

$req = $bdd->prepare($sql);
$req->execute();

$allusers = $req->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    
	<!--link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"--> 
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
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAdd">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" id="formAdd" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabelAdd">Booking<span id="WeekendOrWeekday"></span></h4>
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="facility" class="col-sm-2 control-label">Facility</label>
					<div class="col-sm-10">
					  <select name="facility" class="form-control" id="facilityAdd">
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
					<label for="user" class="col-sm-2 control-label">User</label>
					<div class="col-sm-10">
                        <?php 
                        if($userRole!="admin"){
                            echo '<input type="text" name="user" class="form-control" id="userAdd" value="'.$userID.'" readonly>';
                        }
                        else{
                            echo '<select name="user" class="form-control" id="userAdd">';
                            foreach($allusers as $eachuser){
                                echo "<option value='".$eachuser["ID"]."'>".$eachuser["ID"]." ".$eachuser["Username"]." </option>";
                            }
                           echo '</select>';
                        } 
                        
                        ?>
					</div>
				  </div>
                  <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Date</label>
					<div class="col-sm-10">
					  <input type="text" name="startDate" class="form-control" id="startDateAdd" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="startTime" class="col-sm-2 control-label">Start time</label>
					<div class="col-sm-10">
					  <select name="startTime" class="form-control" id="startTimeAdd">
                          
                      </select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="endTime" class="col-sm-2 control-label">End time</label>
					<div class="col-sm-10">
					  <select name="endTime" class="form-control" id="endTimeAdd">
                          
                      </select>
					</div>
				  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Unit Price</label>
                    <div class="col-sm-10">
                        <span>£</span><span id="moneyAdd"></span>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="totalmoney" class="col-sm-2 control-label">Total Price</label>
                    <div class="col-sm-10">
                        <input type="text" name="totalmoney" class="form-control" id="totalmoneyAdd" readonly>
                    </div>
                </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnAdd">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
        
        <!-- Modal -->
        <?php
        if($userRole=="admin"){
        echo '<div class="modal fade" id="ModalBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" id="formBlock" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabelBlock">Add Block</h4>
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="facility" class="col-sm-2 control-label">Facility</label>
					<div class="col-sm-10">
					  <select name="facility" class="form-control" id="facilityBlock">
						  <option value="">Choose</option>';
                          
                          foreach($facilities as $facility): 
                            echo "<option style='color:".$facility['Color'].";' value=".$facility['ID'].">&#9724; ".$facility['Name']."</option>";
                          endforeach;
                          echo '
                          <option style="color:#000;" value="0">All</option>
						</select>
					</div>
				  </div>
                  <div class="form-group">
					<label for="user" class="col-sm-2 control-label">UserID</label>
					<div class="col-sm-10">
					  <input type="text" name="user" class="form-control" id="userBlock" value="'; echo $userID; echo'" readonly>
					</div>
				  </div>
                  <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-10">
					  <input type="date" name="startDate" class="form-control" id="startDateBlock">
					</div>
				  </div>
                  <div class="form-group">
					<label for="endDate" class="col-sm-2 control-label">End Date</label>
					<div class="col-sm-10">
					  <input type="date" name="endDate" class="form-control" id="endDateBlock">
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnBlock">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>';
        }
        ?>
        <!-- Modal -->
        <?php 
        if($userRole=="admin"){ echo '
        <div class="modal fade" id="ModalDeleteBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" id="formDeleteBlock" method="POST" action="rmvEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabelDeleteBlock">Remove Block</h4>
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="deleteBlock" class="col-sm-2 control-label">Block</label>
					<div class="col-sm-10">
					  <select name="deleteBlock" class="form-control" id="facilityDeleteBlock">
						  <option value="">Choose</option>';
                          
                          foreach($blocks as $block): 
                            echo "<option value=".$block[0].">".$block[0]." ".$block[1]." ".$block[2]."~".$block[3]."</option>";
                          endforeach;
                          echo '
						</select>
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id="btnDeleteBlock">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>';
        }
        ?>
        <!-- Modal -->
        <?php
        if($userRole=="admin"||$userRole=="trainer"){ echo'
		<div class="modal fade" id="ModalTrainer" tabindex="-1" role="dialog" aria-labelledby="myModalLabelTrainer">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" id="formTrainer" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabelTrainer">Add Block for training course</h4>
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="facility" class="col-sm-2 control-label">Facility</label>
					<div class="col-sm-10">
					  <select name="facility" class="form-control" id="facilityTrainer">
						  <option value="">Choose</option>';
                          
                          foreach($facilities as $facility): 
                            echo "<option style='color:".$facility['Color']."' value=".$facility['ID'].">&#9724; ".$facility['Name']."</option>";
                          endforeach;
                          echo '
						</select>
					</div>
				  </div>
                  <div class="form-group">
					<label for="user" class="col-sm-2 control-label">UserID</label>
					<div class="col-sm-10">
					  <input type="text" name="user" class="form-control" id="userTrainer" value="'; echo $userID; echo '" readonly>
					</div>
				  </div>
                  <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-10">
					  <input type="date" name="startDate" class="form-control" id="startDateTrainer">
					</div>
				  </div>
                  <div class="form-group">
					<label for="endDate" class="col-sm-2 control-label">End Date</label>
					<div class="col-sm-10">
					  <input type="date" name="endDate" class="form-control" id="endDateTrainer">
					</div>
				  </div>
                  <div class="form-group">
					<label for="whichDay" class="col-sm-2 control-label">Which day</label>
					<div class="col-sm-10">
					  <select name="whichDay" class="form-control" id="whichDayTrainer">
                          <option value="">Choose</option>
                          <option value="0">Sunday</option>
                          <option value="1">Monday</option>
                          <option value="2">Tuesday</option>
                          <option value="3">Wednesday</option>
                          <option value="4">Thursday</option>
                          <option value="5">Friday</option>
                          <option value="6">Saturday</option>
                      </select>
					</div>
				  </div>
                  <div class="form-group">
                    <label for="startTime" class="col-sm-2 control-label">Start time</label>
                    <div class="col-sm-10">
                      <select name="startTime" class="form-control" id="startTimeTrainer">
                          
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="endTime" class="col-sm-2 control-label">End time</label>
                    <div class="col-sm-10">
                      <select name="endTime" class="form-control" id="endTimeTrainer">
                          
                      </select>
                    </div>
                  </div>
			  </div>
                
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnTrainer">Save changes</button>
			  </div>
			</form>
                
			</div>
		  </div>
		</div>';
        }?>
        <div class="modal fade" id="ModalRmv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
                <h1 style="margin-left: 20px;">Do you want to remove the event?</h1>
                <h4><span style="margin-left: 20px;">Event ID: </span><span id="h1RmvID"></span></h4>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id="btnRmv">Confirm</button>
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

        $("#facilityAdd, #endTimeAdd, #startTimeAdd").change(function() {
            if($("#facilityAdd").val()=="4"){
                //for track
                $('#startTimeAdd').append( "<option id='startExtratimeAdd'>00:00</option>" );
                $('#startTimeAdd').val('00:00');
                $('#endTimeAdd').append( "<option id='endExtratimeAdd'>24:00</option>" );
                $('#endTimeAdd').val('24:00');
                $('#startTimeAdd').prop('disabled', true);
                $('#endTimeAdd').prop('disabled', true);
                //for price
                var facilitychosen = Number($("#facilityAdd").val());
                $("#moneyAdd").text(facilitiesPrice[facilitychosen-1][1]);
                //for totalprice
                $("#totalmoneyAdd").val(facilitiesPrice[facilitychosen-1][1]);
            }
            else if($("#facilityAdd").val()!=""){
                //for track
                $('#startExtratimeAdd').remove();
                $('#endExtratimeAdd').remove();
                $('#startTimeAdd').prop('disabled', false);
                $('#endTimeAdd').prop('disabled', false);
                //for price
                var facilitychosen = Number($("#facilityAdd").val());
                $("#moneyAdd").text(facilitiesPrice[facilitychosen-1][1]);
                $("#totalmoneyAdd").val("");
            }
            else{
                //for track
                $('#startExtratimeAdd').remove();
                $('#endExtratimeAdd').remove();
                $('#startTimeAdd').prop('disabled', false);
                $('#endTimeAdd').prop('disabled', false);
                //for price
                $("#moneyAdd").text("");
                $("#totalmoneyAdd").val("");
            }
                
            
            if($("#facilityAdd").val()!=""&&$("#facilityAdd").val()!="4"  && $("#startTimeAdd").val()!="" && $("#endTimeAdd").val()!=""){
                //for totalprice
                var facilitychosen = Number($("#facilityAdd").val());
                var startTimeAdd = $("#startTimeAdd").val();
                var endTimeAdd = $("#endTimeAdd").val();
                var startarray = startTimeAdd.split(":");
                var endarray = endTimeAdd.split(":");
                $("#totalmoneyAdd").val(   Number(facilitiesPrice[facilitychosen-1][1])*(Number(endarray[0])-Number(startarray[0] ))     );
            }
        });
        
        $("#btnAdd").click(function(){
            if($("#facilityAdd").val()!="4")
                checkTimeAdd();
            else
                beingblockedAdd();
        });
        function checkTimeAdd(){
            if($("#facilityAdd").val()==""){
                alert("choose a facility");
                return false;
            } 
            var starttime = $("select#startTimeAdd").val();
            var endtime = $("select#endTimeAdd").val();
            if(starttime==""||endtime==""){
                alert("the time should be input");
                return false;
            }if(starttime==endtime){
                alert("start time cannot be identical to end time");
                return false;
            }
            var starttimeArray = starttime.split(":");
            var endtimeArray = endtime.split(":");
            if(parseInt(starttimeArray[0])>parseInt(endtimeArray[0])||(parseInt(starttimeArray[0])==parseInt(endtimeArray[0])&&parseInt(starttimeArray[1])>parseInt(endtimeArray[1]))){
                alert("start time should be eariler than end time");
                return false;
            }
            beingblockedAdd();
        }
        function beingblockedAdd(){
            var date = $("input#startDateAdd").val();
            var starttime = $("select#startTimeAdd").val();
            var endtime = $("select#endTimeAdd").val();
            var chosenfacility = $("select#facilityAdd").val();
            $.ajax({
                url: 'checkEventOverlap.php',
                type: "POST",
                data: {date, starttime,endtime,chosenfacility},
                success: function(rep) {
                    if(rep == 'OK'){
                        $( "form#formAdd" ).submit();
                    }else{
                        alert(rep);
                    }
                }
            });
        }
        
        $("#btnBlock").click(function(){
            checkTimeBlock();
        });
        function checkTimeBlock(){
            if($("#facilityBlock").val()==""){
                alert("choose a facility");
                return false;
            } 
            var startdate = $("input#startDateBlock").val();
            var enddate = $("input#endDateBlock").val();
            var startdateArray = startdate.split("-");
            var enddateArray = enddate.split("-");
            if(parseInt(startdateArray[0])>parseInt(enddateArray[0])||(parseInt(startdateArray[0])==parseInt(enddateArray[0])&&parseInt(startdateArray[1])>parseInt(enddateArray[1]))
               ||(parseInt(startdateArray[0])==parseInt(enddateArray[0])&&parseInt(startdateArray[1])==parseInt(enddateArray[1])&&parseInt(startdateArray[2])>parseInt(enddateArray[2]))){
                alert("start time should not be later than end time");
                return false;
            }
            beingblockedBlock();
        }
        function beingblockedBlock(){
            var startdate = $("input#startDateBlock").val();
            var enddate = $("input#endDateBlock").val();
            var chosenfacility = $("select#facilityBlock").val();
            $.ajax({
                url: 'checkEventOverlap.php',
                type: "POST",
                data: {startdate, enddate,chosenfacility},
                success: function(rep) {
                    if(rep == 'OK'){
                        $( "form#formBlock" ).submit();
                    }else{
                        alert(rep);
                    }
                }
            });
        }
        
        $("#whichDayTrainer").change(function() {
            if($("#whichDayTrainer").val()=="6"||$("#whichDayTrainer").val()=="0"){
                 $('#startTimeTrainer').html('<option value="">Choose</option>\n<option>9:00</option>\n<option>10:00</option>\n<option>11:00</option>\n<option>12:00</option>\n<option>13:00</option>\n<option>14:00</option>\n<option>15:00</option>\n<option>16:00</option>\n<option>17:00</option>');
                $('#endTimeTrainer').html('<option value="">Choose</option>\n<option>10:00</option>\n<option>11:00</option>\n<option>12:00</option>\n<option>13:00</option>\n<option>14:00</option>\n<option>15:00</option>\n<option>16:00</option>\n<option>17:00</option>\n<option>18:00</option>');
            }
            else if($("#whichDayTrainer").val()==""){
                $('#startTimeTrainer').html('');
                $('#endTimeTrainer').html('');
            }
            else{
                $('#startTimeTrainer').html('<option value="">Choose</option>\n<option>7:00</option>\n<option>8:00</option>\n<option>9:00</option>\n<option>10:00</option>\n<option>11:00</option>\n<option>12:00</option>\n<option>13:00</option>\n<option>14:00</option>\n<option>15:00</option>\n<option>16:00</option>\n<option>17:00</option>\n<option>18:00</option>\n<option>19:00</option>\n<option>20:00</option>\n<option>21:00</option>');
                $('#endTimeTrainer').html('<option value="">Choose</option>\n<option>8:00</option>\n<option>9:00</option>\n<option>10:00</option>\n<option>11:00</option>\n<option>12:00</option>\n<option>13:00</option>\n<option>14:00</option>\n<option>15:00</option>\n<option>16:00</option>\n<option>17:00</option>\n<option>18:00</option>\n<option>19:00</option>\n<option>20:00</option>\n<option>21:00</option>\n<option>22:00</option>');
            }
        });
        $("#facilityTrainer, #whichDayTrainer").change(function() {
            if($("#facilityTrainer").val()=="4"){
                //for track
                $('#startTimeTrainer').append( "<option id='startExtratimeTrainer'>00:00</option>" );
                $('#startTimeTrainer').val('00:00');
                $('#endTimeTrainer').append( "<option id='endExtratimeTrainer'>24:00</option>" );
                $('#endTimeTrainer').val('24:00');
                $('#startTimeTrainer').prop('disabled', true);
                $('#endTimeTrainer').prop('disabled', true);
            }
        
            else if($("#facilityTrainer").val()!=""){
                //for track
                $('#startExtratimeTrainer').remove();
                $('#endExtratimeTrainer').remove();
                $('#startTimeTrainer').prop('disabled', false);
                $('#endTimeTrainer').prop('disabled', false);
            }
            else{
                //for track
                $('#startExtratimeTrainer').remove();
                $('#endExtratimeTrainer').remove();
                $('#startTimeTrainer').prop('disabled', false);
                $('#endTimeTrainer').prop('disabled', false);
            }
        });
        $("#btnTrainer").click(function(){
            if($("#facilityTrainer").val()!="4")
                checkTimeTrainer();
            else
                checkDateTrainer();
        });
        function checkTimeTrainer(){
            if($("#facilityTrainer").val()==""){
                alert("choose a facility");
                return false;
            }
            if($("#whichDayTrainer").val()==""){
                alert("choose a day");
                return false;
            } 
            var starttime = $("select#startTimeTrainer").val();
            var endtime = $("select#endTimeTrainer").val();
            if(starttime==""||endtime==""){
                alert("the time should be input");
                return false;
            }if(starttime==endtime){
                alert("start time cannot be identical to end time");
                return false;
            }
            var starttimeArray = starttime.split(":");
            var endtimeArray = endtime.split(":");
            if(parseInt(starttimeArray[0])>parseInt(endtimeArray[0])||(parseInt(starttimeArray[0])==parseInt(endtimeArray[0])&&parseInt(starttimeArray[1])>parseInt(endtimeArray[1]))){
                alert("start time should be eariler than end time");
                return false;
            }
            checkDateTrainer();
        }
        function checkDateTrainer(){
            var day = $("#whichDayTrainer").val();
            var startDate = new Date($("#startDateTrainer").val());
            var endDate = new Date($("#endDateTrainer").val());
            startDate.setDate(startDate.getDate() + (Number(day)+(7-startDate.getDay())) % 7);
            if(endDate-startDate<0){
                alert("no such day. Please try to adjust the end date.");
                return false;
            }
            endDate.setDate(endDate.getDate() - (-Number(day)+(7+endDate.getDay())) % 7);
            beingblockedTrainer(startDate,endDate);
        }
        function beingblockedTrainer(startDate,endDate){
            var startDateStr = startDate.getFullYear() + "-" + ("0"+(startDate.getMonth()+1)).slice(-2) + "-" + ("0" + startDate.getDate()).slice(-2);
            var endDateStr = endDate.getFullYear() + "-" + ("0"+(endDate.getMonth()+1)).slice(-2) + "-" + ("0" + endDate.getDate()).slice(-2);
            var whichDay = $("select#whichDayTrainer").val();
            var starttime = $("select#startTimeTrainer").val();
            var endtime = $("select#endTimeTrainer").val();
            var chosenfacility = $("select#facilityTrainer").val();
            $.ajax({
                url: 'checkEventOverlap.php',
                type: "POST",
                data: {startDateStr,endDateStr, whichDay, starttime,endtime,chosenfacility},
                success: function(rep) {
                    if(rep == 'OK'){
                        $( "form#formTrainer" ).submit();
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
                customButtons: {
                    addBlock: {
                      text: 'add block',
                      click: function() {
                        $('#ModalBlock').modal('show');
                      }
                    },
                    deleteBlock: {
                      text: 'remove block',
                      click: function() {
                        $('#ModalDeleteBlock').modal('show');
                      }
                    },
                    trainer: {
                      text: 'trainer',
                      click: function() {
                        $('#ModalTrainer').modal('show');
                      }
                    }
                },
                header: {
                    left: 'prev,next today <?php if($userRole=="admin")echo "addBlock deleteBlock"; if($userRole=="admin"||$userRole=="trainer")echo " trainer";?>',
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
                        var startDayArray = start.startStr.split("T");
                        $('#ModalAdd #startDateAdd').val(startDayArray[0]);
                        $('#WeekendOrWeekday').text(' on weekend');
                        $('#startTimeAdd').html('<option value="">Choose</option>\n<option>9:00</option>\n<option>10:00</option>\n<option>11:00</option>\n<option>12:00</option>\n<option>13:00</option>\n<option>14:00</option>\n<option>15:00</option>\n<option>16:00</option>\n<option>17:00</option>');
                        $('#endTimeAdd').html('<option value="">Choose</option>\n<option>10:00</option>\n<option>11:00</option>\n<option>12:00</option>\n<option>13:00</option>\n<option>14:00</option>\n<option>15:00</option>\n<option>16:00</option>\n<option>17:00</option>\n<option>18:00</option>');
                        $('#ModalAdd').modal('show');
                    }
                    else{
                        var startDayArray = start.startStr.split("T");
                        $('#ModalAdd #startDateAdd').val(startDayArray[0]);
                        $('#WeekendOrWeekday').text(' on Weekday');
                        $('#startTimeAdd').html('<option value="">Choose</option>\n<option>7:00</option>\n<option>8:00</option>\n<option>9:00</option>\n<option>10:00</option>\n<option>11:00</option>\n<option>12:00</option>\n<option>13:00</option>\n<option>14:00</option>\n<option>15:00</option>\n<option>16:00</option>\n<option>17:00</option>\n<option>18:00</option>\n<option>19:00</option>\n<option>20:00</option>\n<option>21:00</option>');
                        $('#endTimeAdd').html('<option value="">Choose</option>\n<option>8:00</option>\n<option>9:00</option>\n<option>10:00</option>\n<option>11:00</option>\n<option>12:00</option>\n<option>13:00</option>\n<option>14:00</option>\n<option>15:00</option>\n<option>16:00</option>\n<option>17:00</option>\n<option>18:00</option>\n<option>19:00</option>\n<option>20:00</option>\n<option>21:00</option>\n<option>22:00</option>');
                        $('#ModalAdd').modal('show');
                    }
                },
                slotDuration: '01:00',
                eventRender: function(event, element) {
                    /*element.bind('dblclick', function() {
                        //$('#ModalEdit #id').val(event.id);
                        //$('#ModalEdit #title').val(event.title);
                        //$('#ModalEdit #color').val(event.color);
                        //$('#ModalEdit').modal('show');
                    });*/
                },
                
                <?php if($userRole=="admin")echo "
                eventClick: function(info) {
                    $('#h1RmvID').text(info.event.id);
                    $('#ModalRmv').modal('show');
                },";
                ?>
                
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
                        title: '<?php echo $booking['Name']; ?>',
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
            $( "#btnRmv" ).click(function() {
                remove($('#h1RmvID').text());
            });
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
                $('#ModalRmv').modal('hide');
            }


            calendar.render();
        });
    </script>
</body>

</html>