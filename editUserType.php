<?php
session_start();
include ('PDO.php');
include('header.php');
include('session_check.php');
include('config_wyj.php');
include('footer.php');

if($userName = $_POST['userName']){}
else{
    $userName="@";
}

$sql="SELECT * FROM Users WHERE userName LIKE '%$userName%'";
$statement = $pdo->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Type Update</title>

    <?php
    include('meta_data.php');
    ?>

</head>
<body>
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

    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
        $("#content").css("display", "none");

    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
        $("#content").css("display", "block");
    });

</script>

<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;">
    <img src='images/loading.gif' width="64" height="64" /><br>Loading..</div>

<div id="content" style="margin-top:10px;margin-left: 10%; margin-right: 10%; WORD-BREAK: break-all; ">
    <div class="table_div">

    <center><h2 style="color:black;">Edit User Type</h2></center><br>

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
            <th>No.</th>
            <th>user name</th>
            <th>first name</th>
            <th>last name</th>
            <th>user type</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $number=1;
        while($rows = $statement->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $number; $number++;?></td>
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
                                            <option value="member">Member</option>
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

</div>
</body>
</html>
