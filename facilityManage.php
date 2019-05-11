<!DOCTYPE html>
<?php

session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>facilityManage</title>

    <?php
    include('meta_data.php');
    ?>
<script>
    $(document).ready(function(){

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
include('header.php');
include('config_wyj.php');

$pdo = new PDO($db_host.";".$db_name, $db_user, $db_pass);

$sql="select * from facility";
$statement = $pdo->query($sql);
$table= $statement->fetchAll(PDO::FETCH_NUM);

?>

<div class="facility_manage_div">
    <h3>Facility list below:</h3>
<div class="table_div">
    <table class="table table-striped table_f_manage">
        <thred>
            <tr>
                <th scope="col" >#</th>
                <th scope="col">Facility name</th>
                <th scope="col">Edition
                <th scope="col">Deletion</th>
            </tr>
        </thred>
        <tbody>
        <?php
        for ($i=0;$i<count($table);$i++) {
            ?>
            <tr>
                <th scope="row"><?php echo $i+1; ?></th>
                <td ><?php echo $table[$i][1]; ?></td>
                <td ><button class="facility_edit_btn"><a href="facilityEdit.php? id=<?php echo $table[$i][0] ?>">Edit</a></button></td>
                <td ><button class="delete" id='del_<?php echo $table[$i][1] ?>'>Delete</button></td>
            </tr>
            <?php
        }
        ?>
        </tbody>


    </table>
</div>


    <a href="facilityAdd.php">Add a new facility</a>

</div>


<?php
include('footer.php');
?>
</body>
</html>

