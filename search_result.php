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

$statement = $pdo->query($sql);

?>

<head>
    <meta charset="utf-8">
    <title>Search Result</title>

    <?php
    include('meta_data.php');
    ?>

</head>
<div id="content" style="margin-left: 10%; margin-right: 10%; WORD-BREAK: break-all; WORD-WRAP: break-word">

    <center><h1 style="color:black;">Search facility result</h1></center><br>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>NO.</th>
            <th>Facility name</th>
            <th>Location</th>
            <th>Unit price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $number=1;
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
</html>

