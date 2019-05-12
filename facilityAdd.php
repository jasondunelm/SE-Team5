<?php
session_start();
include('web_temp.php');
?>
<!DOCTYPE html>
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
/*include('header.php');
include('session_check.php');
include('footer.php');*/
?>


<div class="facility_edit_div">
    <h2>Add facility information here:</h2>
    <p></p>

    <form class="facility_infor_edit" method="POST"  enctype="multipart/form-data" >
        <div class="form-group">
            <label >Facility name</label>
            <input type="text" class="form-control" name="facilityName" >
        </div>
        <div class="form-group">
            <label >Capacity</label>
            <input type="text" class="form-control" name="capacity" onkeyup="value=value.replace(/[^\d]/g,'')">
        </div>
        <div class="form-group">
            <label >Unit price</label>
            <input type="text" class="form-control" name="unitPrice"" onkeyup= "clearNoNum(this)"/>
        </div>
        <div class="form-group">
            <label >Location</label>
            <input type="text" class="form-control" name="location" >
        </div>

        <div class="form-group">
            <label >Member Price</label>
            <input type="text" class="form-control" name="memberPrice"  onkeyup= "clearNoNum(this)" >
        </div>

        <div class="form-group">
            <label >Color</label>
            <input type="text" class="form-control" name="color" >
        </div>

        <div class="form-group">
            <label >Introduction</label>
            <textarea class="form-control" name="introduction" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label >Picture</label>
            <input type="file" name="image"  />
        </div>


        <button type="submit" class="btn btn-primary edit_btn_group" name="upload" >Submit</button>
        <a href="facilityManage.php" class="btn btn-primary">Cancel</a>

    </form>

</div>
</body>
</html>

<?php
include('config_wyj.php');

try{
    $con = new PDO($db_host.";".$db_name, $db_user, $db_pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
}
catch(PDOException $e)
{
    echo "error:".$e->getMessage();
}

if(isset($_POST['upload']))

{
    $facilityName = $_POST['facilityName'];
    $capacity = $_POST['capacity'];
    $unitPrice =$_POST['unitPrice'];
    $location=$_POST['location'];
    $memberPrice=$_POST['memberPrice'];
    $color=$_POST['color'];
    $facilityIntro=$_POST['introduction'];
    $image = $_FILES['image']['name'];


    if($facilityName ==null|| $capacity==null || $unitPrice==null || $location==null ||$memberPrice==null
        || $color==null || $facilityIntro==null){
        echo "<script> alert(\"Please fill in all the blanks!\"); </script>";
    }

    else {


        $folder = "images/";

        $image = $_FILES['image']['name'];

        $path = $folder . $image;

        $target_file = $folder . basename($_FILES["image"]["name"]);


        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


        $allowed = array('jpeg', 'png', 'jpg');

        $filename = $_FILES['image']['name'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);


        if (!in_array($ext, $allowed)) {

            echo "<script> alert(\"Sorry, only JPG, JPEG, PNG & GIF  files are allowed.\"); </script>";
            //echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

        } else {

            move_uploaded_file($_FILES['image'] ['tmp_name'], $path);

            echo "test here";

            $sth=$con->prepare("insert into Facility (id,facilityName,capacity,unitPrice,location,memberPrice,facilityIntro,facilityPic,color)
values (null,'$facilityName','$capacity','$unitPrice','$location','$memberPrice','$facilityIntro','$image','$color') ");

           $sth->execute();

            echo "<script> alert(\"update sucessfully!\"); </script>";
            //header("Location:facilityManage.php");
            echo "<script> location.href=\"facilityManage.php\";</script>";


        }
    }

}

?>



