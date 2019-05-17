<?php
session_start();
include ('PDO.php');
include('header.php');
include('session_check.php');
include('config_wyj.php');
include('footer.php');

$sql="SELECT * FROM Facility WHERE location='Sports Hall'";
$statement= $pdo->query($sql);
?>
<head>
    <meta charset="utf-8">
    <title>Sports Hall</title>

    <?php
    include('meta_data.php');
    ?>

</head>
<div id="container" style="margin-left: 10%; margin-right: 10%; padding-top: 5%;">
    <div class="row">
    <?php
    while($rows = $statement->fetch(PDO::FETCH_ASSOC)){
        ?>
    <div class="col-md-4">
        <a href="facility.php?facilityName=<?php echo $rows['facilityName']?>" class="pic_link">
            <img src="images/<?php echo $rows['facilityPic']?>" alt="..." class="img-thumbnail" style="width:300px; height:240px;">
            <h5><?php echo $rows['facilityName']?></h5>
        </a>
    </div>
        <?php
    }
    ?>
</div>
</div>
