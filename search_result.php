<!DOCTYPE html>
<?php
include "web_temp.php";
include "PDO.php";
$facilityName=$_POST ['facilityName'];

$sql="SELECT * FROM Facility WHERE facilityName LIKE '%$facilityName%' OR location LIKE '%$facilityName%'";
$statement = $pdo->query($sql);

?>


<div id="content" style="margin-left: 10%; margin-right: 10%; WORD-BREAK: break-all; WORD-WRAP: break-word">

    <center><h1 style="color:black;">Search facility result</h1></center><br>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>facility name</th>
            <th>location</th>
            <th>unit price</th>
            <th>member price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($rows = $statement->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><a href="facility.php?facilityName=<?php echo $rows['facilityName'] ?>"><?php echo $rows['facilityName'] ?></a></td>
                <td><?php echo $rows['location']?></td>
                <td><?php echo $rows['unitPrice'] ?></td>
                <td><?php echo $rows['memberPrice'] ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

</div>





</body>
</html>

