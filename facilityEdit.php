<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Facility Update Info</title>

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
include('session_check.php');
include('config_wyj.php');
include('footer.php');

$name = $_GET['id'];

$facilityId = $_GET['id'];

$pdo = new PDO($db_host.";".$db_name, $db_user, $db_pass);

$sql="select * from Facility where id= ".$facilityId. ";";
$statement = $pdo->query($sql);
$table_pre= $statement->fetchAll(PDO::FETCH_ASSOC);
//facility_edit_container

?>
<div class="container" >
    <h2>Edit facility information</h2>
    <div class="facility_edit_div">

        <form class="facility_infor_edit" method="POST"  enctype="multipart/form-data" >
            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Facility name</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="facilityName" value="<?php echo $table_pre[0]['facilityName']; ?>">
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Capacity</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="capacity" value="<?php echo $table_pre[0]['capacity']; ?>" onkeyup="value=value.replace(/[^\d]/g,'')">
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Unit price</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="unitPrice" value="<?php echo $table_pre[0]['unitPrice']; ?>" onkeyup="clearNoNum(this)"/>
                 </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Location</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="location" value="<?php echo $table_pre[0]['location']; ?>">
                </div>
                <div class="col-md-2"></div>
            </div>


            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Color</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="color" value="<?php echo $table_pre[0]['color']; ?>">
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Introduction</label>
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" name="introduction" rows="3"><?php echo $table_pre[0]['introduction']; ?></textarea>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Picture</label>
                </div>
                <div class="col-md-6">
                    <input type="file" name="image"  />
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row" style="padding: 10px">
                <div class="col-md-4"></div>
                    <div class="col-md-6">
                    <p><img src="<?php echo "images/".$table_pre[0]['image']; ?>" alt="picture of current facility" class="img-thumbnail"></p>
                        <button type="submit" class="btn btn-primary edit_btn_group" name="upload" >Submit</button>
                        <a href="facilityManage.php" class="btn btn-primary">Cancel</a>
                </div>

            </div>

        </form>

    </div>



</div>


<?php


if(isset($_POST['upload']))

{
    $facilityName = $_POST['facilityName'];
    $capacity = $_POST['capacity'];
    $unitPrice =$_POST['unitPrice'];
    $location=$_POST['location'];
    $color=$_POST['color'];
    $facilityIntro=$_POST['introduction'];
    $image = $_FILES['image']['name'];


    if($facilityName ==null|| $capacity==null || $unitPrice==null || $location==null
        || $color==null || $facilityIntro==null){
        echo "<script> alert(\"Please fill in all the blanks!\"); </script>";
    }

    else if($image == null){
        $sql = "update Facility set facilityName= '".$facilityName."',capacity= ".$capacity.",unitPrice=".$unitPrice.",location='".$location."', facilityIntro='".$facilityIntro."', color='".$color."' where Facility.id= ".$facilityId.";";
        echo $sql;
        $statement = $pdo->query($sql);
        echo "<script> alert(\"update sucessfully!\"); </script>";
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

            $sql = "update Facility set facilityName= '" . $facilityName . "',capacity= ".$capacity.",unitPrice=".$unitPrice.",location='".$location."', facilityIntro='".$facilityIntro."', facilityPic = '".$image."', color='".$color."' where Facility.id= ".$facilityId.";";

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

