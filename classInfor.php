<?php
session_start();
include ('PDO.php');
include('header.php');
include('session_check.php');
include('config_wyj.php');
include('footer.php');

if($className=$_GET ['className']){
}
else{
    echo "<script> location.href=\"index_admin.php \"</script>";
}

$sql="SELECT * FROM Training WHERE className='$className'";
//$sql="SELECT * FROM Facility WHERE facilityName like '%$facilityName%'";
$statement = $pdo->query($sql);
$rows = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<header>
    <meta charset="utf-8">
    <title>Class</title>
    <?php
    include('meta_data.php');
    ?>

</header>
<body>
<?php
//include('header.php');
//include('session_check.php');
?>
<div id="content" style="margin-left: 10%; margin-right: 10%; margin-bottom: 5%; WORD-BREAK: normal; WORD-WRAP: break-word">
    <center><h1 style="color:black;"><?php echo $rows['className']?></h1></center><br>
    <div class="row">

        <div class="col-md-5">
            <img src="images/<?php echo $rows['classImage'] ?>" style="width:100%; height:auto;"><br><br>
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
                            Uniprice
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $rows['price'] ?>
                    </div>
                </div>

                <div class="panel panel-default" style="background-color:white">
                    <div class="panel-heading" style="background-color:ghostwhite">
                        <h3 class="panel-title">
                            Introduction:
                        </h3>
                    </div>
                    <div class="panel-body" >
                        <?php echo $rows['introduction']?>
                    </div>
                </div>

            </div>
            <br>
            <?php
                echo "<h4>Online booking system of this class will be available soon!</h4> ";
            ?>
        </div>
    </div>

</div>



</body>
</html>

