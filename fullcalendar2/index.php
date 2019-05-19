<?php
session_start();
$_SESSION['userName']="tuohao11@gmail.com";
$_SESSION['userName']="tuo.hao@durham.ac.uk";
//$_SESSION['userName']="tzu-chiao.wang2@durham.ac.uk";
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

$sql = "SELECT `ID`, `Username`, `role`, `Firstname`, `Lastname` FROM `users` WHERE 1";
$req = $bdd->prepare($sql);
$req->execute();
$allusers = $req->fetchAll();

$allusersRole = array(); 
foreach ($allusers as $row) {
    $allusersRole[$row["ID"]]= $row["role"];
}
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>Homepage</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
        padding-top: 120px;
    
    }
	#calendar {
/*		max-width: 800px;*/
	}
/*
	.col-centered{

		float: none;
		margin: 0 auto;

	}
*/
        
    .navbar{
    background-color: #742e68 !important;
}



.navbar.nav-item .dropdown-menu .dropdown-item{
    color: #000 !important;
}


.team-durham-slogan{
   position: absolute;
    top: 40%;
    left: 45%;
    
    transform: translate(-50%, -50%) 
    float:left;

    line-height:60%;


    color:#fff;

        }
    .light{
            color:#cf9ace;
        }
    .slogan{
         
        font-size:20px;
        }

        
   .btn1-outline-success:hover{
    background-color: #742e68;
}
    .btn-1{
    color: white;
    border-style: hidden;
        
}
        .row-fluid{width:100%;*zoom:1;}
        .row-fluid:before,.row-fluid:after{display:table;content:"";line-height:0}
        .row-fluid:after{clear:both;}
        .nav{margin-left:0;
            list-style:none;
            color: white;
            margin-bottom: 0;
            }
        ul, {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
    padding: 0;
    margin: 0 0 10px 25px;
}
        .nav-pills{
            border-bottom: 0;}
    
        .nav-pills>li>a {
            top: 6px;
            vertical-align: middle;
    color: #fff;
    background-color: #742e68;
    padding-top: 8px;
    padding-bottom: 10px;
    margin-top: 2px;
    margin-bottom: 2px;
    border-radius: 0;
    padding-right: 12px;
    padding-left: 12px;
    margin-right: 2px;
    line-height: 14px;

}
        .span12{
            width: 100%;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
        }
        
       .btn-primary {
                      
    color: #fff;
    background-color: purple;
    border-color: purple;
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
    <div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;">
        <img src='../images/loading.gif' width="64" height="64" /><br>Loading..</div>
    <!-- Navigation -->
    <div class="navbar navbar-inverse navbar-fixed-top">
       <div id="header" class="row-fluid">
  
        <a href="" class="pull-left">
        <img width="50" src="../images/teamdurham.png" alt="Durham University" class="durham-university-logo">
        </a>
        <a class="team-durham-slogan">
            <span class="light">Durham University</span>
            <br>
            <br>
            <span class="slogan">Sports Facility</span>
        </a>
           <div class="span12">
               <ul class="nav nav-pills">
                   <li>
                        <a href="../index_admin.php">Home <span class="sr-only">(current)</span></a>
                   </li>
               </ul>
           </div>
      
       </div>

      
        <!-- /.container -->
    </div>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Calendar of all facilities</h1>
                <p class="lead">logged-in user: <?php echo $userRole;?></p>
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
                  <input type="hidden" name="submittedAdd" value="submittedAdd">
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
                    <input type="text" name="user" class="form-control" id="userBlock" value="'; echo $userID; echo'" readonly>          </div>
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
                <input type="hidden" name="submittedBlock" value="submittedBlock">
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
			<form class="form-horizontal" id="formDeleteBlock" onsubmit="return checkDeleteBlock()" method="POST" action="rmvEvent.php">
			
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
                <input type="hidden" name="submittedTrainer" value="submittedTrainer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnTrainer">Save changes</button>
			  </div>
			</form>
            
			</div>
		  </div>
          
		</div>';
        }?>
        <?php
        if($userRole=="admin"){ echo '
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
		</div>';}
        ?>
    </div>

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	<script>
        $(document).ready(function(){
          $("form").on("submit", function(){
            $("#wait").css("display", "block");
            $(".container").css("display", "none");
          });//submit
        });
    </script>
	<script>
        <?php
        $myJSON = json_encode($facilitiesPrice);
        echo "var facilitiesPrice = ".$myJSON.";";
        
        if($userRole=="admin"){
            $myJSON = json_encode($allusersRole);
            echo "var allusersRole = ".$myJSON.";";
        }
        ?>

         $("#facilityAdd, #endTimeAdd, #startTimeAdd, #userAdd").change(function() {
             var discount=1;
             var userchosenID = $("#userAdd").val();
             if(typeof(allusersRole)==='undefined'){
                 <?php
                 if($userRole=="membership"||$userRole=="trainer"||$userRole=="admin")
                     echo 'discount=0.8;';
                 ?>
             }
             else if(allusersRole[userchosenID]=="membership"||allusersRole[userchosenID]=="admin"||allusersRole[userchosenID]=="trainer"){
                 discount=0.8;
             }
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
                $("#totalmoneyAdd").val(facilitiesPrice[facilitychosen-1][1]*discount);
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
                $("#totalmoneyAdd").val(   (Number(facilitiesPrice[facilitychosen-1][1])*(Number(endarray[0])-Number(startarray[0] ))*discount).toFixed(2)     );
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
            var submittedAdd = "submittedAdd";
            var date = $("input#startDateAdd").val();
            var starttime = $("select#startTimeAdd").val();
            var endtime = $("select#endTimeAdd").val();
            var chosenfacility = $("select#facilityAdd").val();
            $.ajax({
                url: 'checkEventOverlap.php',
                type: "POST",
                data: {submittedAdd, date, starttime,endtime,chosenfacility},
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
            var startdate = $("#startDateBlock").val();
            var enddate = $("#endDateBlock").val();
            if(startdate==""||enddate==""){
                alert("the date should be input");
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
            var submittedBlock = "submittedBlock";
            var startdate = $("input#startDateBlock").val();
            var enddate = $("input#endDateBlock").val();
            var chosenfacility = $("select#facilityBlock").val();
            $.ajax({
                url: 'checkEventOverlap.php',
                type: "POST",
                data: {submittedBlock, startdate, enddate,chosenfacility},
                success: function(rep) {
                    if(rep == 'OK'){
                        $( "form#formBlock" ).submit();
                    }else{
                        alert(rep);
                    }
                }
            });
        }
        
        function checkDeleteBlock(){
            if($("#facilityDeleteBlock").val()!=""){
                return true;
            }
            alert("A Block need to be chosen")
            return false;
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
            var startDate = $("#startDateTrainer").val();
            var endDate = $("#endDateTrainer").val();
            if(startDate==""||endDate==""){
                alert("the date should be input");
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
            var submittedTrainer = "submittedTrainer";
            var startDateStr = startDate.getFullYear() + "-" + ("0"+(startDate.getMonth()+1)).slice(-2) + "-" + ("0" + startDate.getDate()).slice(-2);
            var endDateStr = endDate.getFullYear() + "-" + ("0"+(endDate.getMonth()+1)).slice(-2) + "-" + ("0" + endDate.getDate()).slice(-2);
            var whichDay = $("select#whichDayTrainer").val();
            var starttime = $("select#startTimeTrainer").val();
            var endtime = $("select#endTimeTrainer").val();
            var chosenfacility = $("select#facilityTrainer").val();
            
            $.ajax({
                url: 'checkEventOverlap.php',
                type: "POST",
                data: {submittedTrainer, startDateStr,endDateStr, whichDay, starttime,endtime,chosenfacility},
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