<?php
session_start();
include ('PDO.php');
include('header.php');
include('session_check.php');
include('config_wyj.php');
include('footer.php');

if($facilityName=$_GET ['facilityName']){
}
else{
    echo "<script> location.href=\"index_admin.php \"</script>";
}

$sql="SELECT * FROM Facility WHERE facilityName='$facilityName'";
//$sql="SELECT * FROM Facility WHERE facilityName like '%$facilityName%'";
$statement = $pdo->query($sql);
$rows = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<header>
    <meta charset="utf-8">
    <title>Facility</title>
    <?php
    include('meta_data.php');
    ?>
    <script>
        checkRole = function(){
            alert("Only registered user could book online, you have not registered yet.");
            location.href="login.php";
        }
    </script>
</header>
<body>
<?php
//include('header.php');
//include('session_check.php');
?>
<div id="content" style="margin-left: 10%; margin-right: 10%; margin-bottom: 5%; WORD-BREAK: normal; WORD-WRAP: break-word">
            <center><h1 style="color:black;"><?php echo $rows['facilityName']?></h1></center><br>
            <div class="row">

                <div class="col-md-5">
                    <img src="images/<?php echo $rows['facilityPic'] ?>" style="width:100%; height:auto;"><br><br>
                    <img src="images/address.png" style="height:auto; width:100%;"><br><br>
                    <div class="panel panel-default" style="background-color:white">
                        <div class="panel-heading" style="background-color:ghostwhite">
                            <h3 class="panel-title">
                                Address:
                            </h3>
                        </div>
                        <div class="panel-body">
                            The Graham Sports Centre<br>
                            Durham University<br>
                            Stockton Road<br>
                            DH1 3SE<br>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5" >
                    <div class="panel panel-default" style="background-color:gray">

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Location:
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['location'] ?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Capacity
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['capacity'] ?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Introduction:
                                </h3>
                            </div>
                            <div class="panel-body" >
                                <?php echo $rows['facilityIntro']?>
                            </div>
                        </div>

                    </div>
                    <br>
                    <?php
                    if($rows['facilityName']=="Squash courts"||$rows['facilityName']=="Aerobics room"||$rows['facilityName']=="Tennis"||$rows['facilityName']=="Athletics track"){
                        if($_SESSION['role']){
                            echo "<a href=\"fullcalendar2\index.php\" class=\"btn btn-primary btn-lg\">BOOKING</a>";

                        }
                        else{
                            echo "<button class=\"btn btn-primary btn-lg\" onclick='checkRole()'>BOOKING</button>";
                        }
                    }
                    else{
                        echo "<h4>Online booking system of this facility will be available soon!</h4> ";
                    }
                    ?>
                </div>
            </div>

        </div>



</body>
</html>

