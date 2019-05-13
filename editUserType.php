<?php
include "PDO.php";
include "web_temp.php";
error_reporting(E_ALL^E_NOTICE);
if($userName = $_POST['userName']){}
else{
    $userName="@";
}

$sql="SELECT * FROM users WHERE userName LIKE '%$userName%'";
$statement = $pdo->query($sql);
?>

<script>
    var id;
    function getId(obj){
        id=obj.id;
    }

    function update(){
        var role=document.getElementById('role').value;
        $.ajax({
            url:"editUserType_check.php",
            type:'post',
            data:{'id':id,
                'role':role},
            success:update_success,
            fail:not_update_success
        });
    }

    function update_success(){
        alert("Update successfully");
        location.href='editUserType.php';
    }

    function not_update_success(){
        alert("Update failed");
        location.href='editUserType.php';
    }

</script>

<div id="content" style="margin-top:10px;margin-left: 10%; margin-right: 10%; WORD-BREAK: break-all; WORD-WRAP: break-word">

    <center><h1 style="color:black;">Edit User Type</h1></center><br>

    <form  role="form" action="editUserType.php" method="post">
        <center>
        Search user name: &nbsp; &nbsp;
        <input type="text" name="userName" placeholder="user name:"> &nbsp; &nbsp;
        <button type="submit">Search</button><br>
        </center>
    </form>

    <table class="table table-striped table-hover" style="margin-top: 5%; margin-bottom: 5%;">
        <thead>
        <tr>
            <th>user name</th>
            <th>first name</th>
            <th>last name</th>
            <th>user type</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($rows = $statement->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $rows['userName'] ?></td>
                <td><?php echo $rows['firstName'] ?></td>
                <td><?php echo $rows['lastName'] ?></td>
                <td><?php echo $rows['role'] ?></td>
                <td>
                    <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal" id="<?php echo $rows['id']?>" onclick="getId(this)">Edit</button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Change user type</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <select multiple class="form-control" id="role">
                                            <option selected value="user">User</option>
                                            <option value="membership">Membership</option>
                                            <option value="trainer">Trainer</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" onclick="update()" >Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>
