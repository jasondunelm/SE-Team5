
<?php
//include "PDO.php";
//include "web_temp.php";
include('config_wyj.php');

$pdo = new PDO($db_host.";".$db_name, $db_user, $db_pass);
$facilityName=$_GET ['facilityName'];

$sql="SELECT * FROM Facility WHERE facilityName='$facilityName'";
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
</header>
<body>
<?php
include('header.php');
include('session_check.php');
?>
<div id="content" style="margin-left: 10%; margin-right: 10%; WORD-BREAK: break-all; WORD-WRAP: break-word">
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
                                    Introduction:
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['facilityIntro']?>
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
                                    UnitPrice
                                </h3>
                            </div>
                            <div class="panel-body">
                                £<?php echo $rows['unitPrice']?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Telephone:
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['telephone']?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Email:
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['email'] ?>
                            </div>
                        </div>

                    </div>
                    <br>
                    <button type="button" class="btn btn-primary btn-lg">BOOKING</button>
                </div>
            </div>

        </div>



</body>
</html>
