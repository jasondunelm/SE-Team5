<?php
session_start();
include ('PDO.php');
include('header.php');
include('session_check.php');
include('config_wyj.php');
include('footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Facility Manage</title>

    <?php
   // include('meta_data.php');
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script>

    $(document).ready(function(){

        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
            $("#table_div").css("display", "none");

        });
        $(document).ajaxComplete(function(){
            $("#wait").css("display", "none");
            $("#table_div").css("display", "block");
        });


        // Delete
        $('.delete').click(function(){
            var el = this;
            var id = this.id;
            var splitid = id.split("_");
            // Delete id
            var deleteid = splitid[1];



            // AJAX Request
            $.ajax({
                url: 'facilityRemove.php',
                type: 'post',
                data: "id="+deleteid ,
                success: function(response){
                    console.log(response);
                    if(response == 1){
                        // Remove row from HTML Table
                        $(el).closest('tr').css('background','grey');
                        $(el).closest('tr').fadeOut(800,function(){
                            $(this).remove();
                        });


                    }else{
                        alert('Invalid ID.');
                    }

                }
            });

        });

    });
</script>
</head>
<body>

<?php
//include('header.php');
//include('session_check.php');
include('config_wyj.php');

$pdo = new PDO($db_host.";".$db_name,$db_user, $db_pass);

$sql="select * from Facility";
$statement = $pdo->query($sql);
$table= $statement->fetchAll(PDO::FETCH_NUM);

$facilityName= $_POST['facilityName'];
if($_POST['facilityName']!=null){

    $sql="SELECT * FROM Facility WHERE facilityName LIKE '%$facilityName%'";
    $statement = $pdo->query($sql);
    $table= $statement->fetchAll(PDO::FETCH_NUM);
}

?>

<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;">
    <img src='images/loading.gif' width="64" height="64" /><br>Loading..</div>

<div class="facility_manage_div" id="table_div">
    <h3>Facility list</h3>
    <p></p>
    <form  action="facilityManage.php" method="post">
        <center>
            Search facility name: &nbsp; &nbsp;
            <input type="text" name="facilityName" placeholder="facility name"> &nbsp; &nbsp;
            <button type="submit">Search</button><br>
        </center>
    </form>
    <div class="table_div" >
        <table class="table table-striped table-striped table-hover table_f_manage">
            <thred>
                <tr>
                    <th scope="col-md-2" >#</th>
                    <th scope="col-md-8">Facility name</th>
                    <th scope="col-md-1">Edition
                    <th scope="col-md-1">Deletion</th>
                </tr>
            </thred>
            <tbody>
            <?php
            for ($i=0;$i<count($table);$i++) {
                ?>
                <tr>
                    <th scope="row"><?php echo $i+1; ?></th>
                    <td ><?php echo $table[$i][1]; ?></td>
                    <td ><button class="btn btn-primary facility_edit_btn"><a href="facilityEdit.php? id=<?php echo $table[$i][0] ?>">Edit</a></button></td>
                    <td ><button class="btn btn-primary delete" id='del_<?php echo $table[$i][0] ?>'>Delete</button></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <p></p>
    <button class="btn btn-primary facility_edit_btn"><a href="facilityAdd.php">Add new facility</a></button>
</div>

<?php
//include('footer.php');
?>
</body>
</html>

