<!DOCTYPE html>
<?php
session_start();
include ('PDO.php');
include('header.php');
include('session_check.php');
include('config_wyj.php');
include('footer.php');
//
//if($facilityName=$_POST ['facilityName']){
//}
//else{
//    $facilityName="";
//}
if($_POST['facilityName']!=null){
    $facilityName = filter_input(INPUT_POST, 'facilityName', FILTER_SANITIZE_STRING);
}
else
    $facilityName="";

$sql="SELECT * FROM Facility WHERE facilityName LIKE '%$facilityName%' OR location LIKE '%$facilityName%'";

$sql2="SELECT * FROM Training WHERE className LIKE '%$facilityName%' OR location LIKE '%$facilityName%'";


$statement = $pdo->query($sql);
$statement2 = $pdo->query($sql2);

?>

<head>
    <meta charset="utf-8">
    <title>Search Result</title>

    <?php
    include('meta_data.php');
    ?>

</head>
<body>
<div id="content" style="margin-left: 10%; margin-right: 10%; ">

    <center><h1 style="color:black;">Search facility result</h1></center><br>

    <table class="table table-striped table-hover" style="WORD-BREAK: break-all; WORD-WRAP: break-word">
        <thead>
        <tr>
            <th>NO.</th>
            <th>Name</th>
            <th>Location</th>
            <th>Unit price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $number=1;
        while($rows = $statement2->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo "#$number"?></td>
            <td><a href="classInfor.php?className=<?php echo $rows['className'] ?>"><?php echo $rows['className'] ?>(class)</a></td>
            <td><?php echo $rows['location']?></td>
            <td><?php echo $rows['price']?></td>
        </tr>
        <?php
        $number++;
        }
        ?>
        <?php
        while($rows = $statement->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo "#$number"?></td>
                <td><a href="facility.php?facilityName=<?php echo $rows['facilityName'] ?>"><?php echo $rows['facilityName'] ?></a></td>
                <td><?php echo $rows['location']?></td>
                <td><?php echo $rows['unitPrice'] ?></td>
            </tr>
        <?php
            $number++;
        }
        ?>
        </tbody>
    </table>

</div>
</body>


