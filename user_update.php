<!DOCTYPE html>
<?php
session_start();
include "PDO.php";
include "web_temp.php";

//$id=$_SESSION["id"];
$id=1;
$sql="SELECT * FROM Users WHERE id=$id";
$statement = $pdo->query($sql);
$rows = $statement->fetch(PDO::FETCH_ASSOC);
?>



<div class="container" style="padding-top:100px">
    <form method="post" id="update" action="user_update_check.php">
        <center><h1 style="color:black;">Modify Information</h1></center><br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <span class="input-group-text" id="basic-addon3">user name:</span>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" placeholder="<?php echo $rows['userName']?>" readonly><br>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <span class="input-group-text" id="basic-addon3">first name:</span>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Twitterhandle" value="<?php echo $rows['firstName']?>" name="firstName"><br>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <span class="input-group-text" id="basic-addon3">last name:</span>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Twitterhandle" value="<?php echo $rows['lastName']?>" name="lastName"><br>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <span class="input-group-text" id="basic-addon3">Password:</span>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control"  name="password" value="111111"><br>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <span class="input-group-text" id="basic-addon3">Confirm password:</span>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control" name="confirmPassword" value="111111"><br>
                <input type="hidden" name="userName" value="<?php echo $rows['userName']?>">
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="rows">
            <center>
                <button type="submit" class="btn btn-primary btn-lg">UPDATE</button>
            </center>
        </div>
    </form>
</div>

</body>
</html>

