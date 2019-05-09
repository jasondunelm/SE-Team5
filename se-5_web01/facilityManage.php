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

<p>Edit facility information here:</p>



<table width="800">
    <tr>
        <th height="22" align="center" valign="middle">Facility name</th>
        <th height="22" align="center" valign="middle">Edition
        <th height="22" align="center" valign="middle">Deletion</th>
    </tr>
    <?php
    for ($i=0;$i<count($table);$i++) {
        ?>
        <tr>
            <td height="22" align="center" valign="middle"><?php echo $table[$i][1]; ?></td>
            <td height="22" align="center" valign="middle"><button class="facility_edit_btn"><a href="facilityEdit.php? id=<?php echo $table[$i][1] ?>">Edit</a></button></td>
            <td height="22" align="center" valign="middle"><button class="delete" id='del_<?php echo $table[$i][1] ?>'>Delete</button></td>
        </tr>
        <?php
    }
    ?>

</table>

<a href="facilityEdit.php? id=add">Add a new facility</a>
<?php
include('footer.php');
?>
</body>
</html>

