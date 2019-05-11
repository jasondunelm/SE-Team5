<!DOCTYPE html>
<?php

session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Homepage</title>

    <?php
    include('meta_data.php');
    ?>
    <script>
        function clearNoNum(obj){
            obj.value = obj.value.replace(/[^\d.]/g,"");
            obj.value = obj.value.replace(/\.{2,}/g,".");
            obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
            obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3');
            if(obj.value.indexOf(".")< 0 && obj.value !=""){
                obj.value= parseFloat(obj.value);
            }
        }
    </script>
</head>
<body>
<?php
include('header.php');
include('footer.php');
include('config_wyj.php');
$facilityId = $_GET['id'];

$pdo = new PDO($db_host.";".$db_name, $db_user, $db_pass);

$sql="select * from Facility where id= ".$facilityId. ";";
$statement = $pdo->query($sql);
$table_pre= $statement->fetchAll(PDO::FETCH_NUM);

?>
<div class="facility_edit_div">
    <h2>Edit facility information here:</h2>

    <form class="facility_infor_edit" method="POST"  enctype="multipart/form-data" >
        <div class="form-group">
            <label >Facility name</label>
            <input type="text" class="form-control" name="facilityName" value="<?php echo $table_pre[0][1]; ?>">
        </div>
        <div class="form-group">
            <label >Capacity</label>
            <input type="text" class="form-control" name="capacity" value="<?php echo $table_pre[0][2]; ?>" onkeyup="value=value.replace(/[^\d]/g,'')">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Unit price</label>
            <input type="text" class="form-control" name="unitPrice"" value="<?php echo $table_pre[0][3]; ?>" onkeyup= "clearNoNum(this)"/>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $table_pre[0][4]; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Contact</label>
            <input type="text" class="form-control" name="contact" value="<?php echo $table_pre[0][5]; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Telephone</label>
            <input type="text" class="form-control" name="telephone" value="<?php echo $table_pre[0][6]; ?>" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $table_pre[0][7]; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Introduction</label>
            <textarea class="form-control" name="introduction" rows="3"><?php echo $table_pre[0][8]; ?></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Picture</label>
            <input type="file" name="image"  />
        </div>

        <p><img src="<?php echo "images/".$table_pre[0][9]; ?>" alt="picture of current facility" class="img-thumbnail"></p>

        <button type="submit" class="btn btn-primary" name="upload" >Submit</button>
        <a href="facilityManage.php" class="btn btn-primary">Cancel</a>
        <!--<input type="button" class="btn btn-primary" name="upload" value="Submit"></input>-->
    </form>

</div>


<?php


if(isset($_POST['upload']))

{
    $facilityName = $_POST['facilityName'];
    $capacity = $_POST['capacity'];
    $unitPrice =$_POST['unitPrice'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $telephone=$_POST['telephone'];
    $email=$_POST['email'];
    $facilityIntro=$_POST['introduction'];
    $image = $_FILES['image']['name'];


    if($facilityName ==null|| $capacity==null || $unitPrice==null || $address==null ||$contact==null
        || $telephone==null || $email==null || $facilityIntro==null){
        echo "<script> alert(\"Please fill in all the blanks!\"); </script>";
    }

    else if($image == null){
        $sql = "update Facility set facilityName= '" . $facilityName . "',capacity= ".$capacity.",unitPrice=".$unitPrice.",address='".$address."',contact='".$contact."',telephone= '".$telephone."', email= '".$email."', facilityIntro='".$facilityIntro."' where Facility.id= ".$facilityId.";";
        //UPDATE `Facility` SET `facilityName` = 'wwyyjj' WHERE `Facility`.`id` = 23;

        $statement = $pdo->query($sql);
        echo "<script> alert(\"update sucessfully!\"); </script>";
        //header("Location:facilityManage.php");
        echo "<script> location.href=\"facilityManage.php\";</script>";
    }

    else {


        $folder = "images/";

        //$image = $_FILES['image']['name'];

        $path = $folder . $image;

        $target_file = $folder . basename($_FILES["image"]["name"]);


        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


        $allowed = array('jpeg', 'png', 'jpg');

        $filename = $_FILES['image']['name'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);


        if (!in_array($ext, $allowed)) {

            echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

        } else {

            move_uploaded_file($_FILES['image'] ['tmp_name'], $path);

            //$sth=$con->prepare("insert into pic(id,name,image)values(null,'',:image) ");
            //$sth=$con->prepare("insert into Facility(id,facilityName,capacity,unitPrice,address,contact,telephone,email,facilityIntro,facilityPic) values (null,'','','','','','$telephone','$email','$facilityIntro','$image') ");
            //$sth=$con->prepare("insert into Facility (id,facilityName,capacity,unitPrice,address,contact,telephone,email,facilityIntro,facilityPic) values (null,'$facilityName','$capacity','$unitPrice','$address','$contact','$telephone','$email','$facilityIntro','$image') ");

            //$sth = $con->prepare("UPDATE Facility SET id=null,facilityName='$facilityName', capacity='$capacity',unitPrice='$unitPrice',address='$address',contact='$contact',telephone='$telephone',email='$email',facilityIntro='$facilityIntro',facilityPic='$image' WHERE facilityName='$name'");

            $sql = "update Facility set facilityName= '" . $facilityName . "',capacity= ".$capacity.",unitPrice=".$unitPrice.",address='".$address."',contact='".$contact."',telephone= '".$telephone."', email= '".$email."', facilityIntro='".$facilityIntro."', facilityPic = '".$image."' where Facility.id= ".$facilityId.";";

            //$sth->execute();
            $statement = $pdo->query($sql);
            echo "<script> alert(\"update sucessfully!\"); </script>";
            //header("Location:facilityManage.php");
            echo "<script> location.href=\"facilityManage.php\";</script>";

        }
    }

}

?>

</body>
</html>

