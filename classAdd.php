<?php
session_start();
if($_SESSION['id']==null)
    die();
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
    <title>Add New Class</title>
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
        function checkform(){
            if(document.add_Form.className.value==""){
                alert("FacilityName can not be blank!");
                return false;
            }
            if(document.add_Form.capacity.value==""){
                alert("Capacity can not be blank!");
                return false;
            }
            if(document.add_Form.unitPrice.value==""){
                alert("UnitPrice can not be blank!");
                return false;
            }
            if(document.add_Form.location.value==""){
                alert("Location can not be blank!");
                return false;
            }

            if(document.add_Form.introduction.value==""){
                alert("Introduction can not be blank!");
                return false;
            }
            if(document.add_Form.image.value==""){
                alert("Image can not be blank!");
                return false;
            }

            $('#facility_add').hide();
            $('#wait').show();


            return true;


        }

    </script>
</head>
<body>

<div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;">
    <img src='images/loading.gif' width="64" height="64" /><br>Loading..</div>

<div class="facility_edit_container" id="facility_add">
    <h2>Add class information</h2>
    <div class="facility_edit_div">

        <form class="facility_infor_edit" method="POST" name="add_Form" enctype="multipart/form-data" onsubmit="return checkform()">

            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >class name</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="className" >
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Capacity</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="capacity"  onkeyup="value=value.replace(/[^\d]/g,'')">
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Unit price</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="unitPrice" onkeyup= "clearNoNum(this)"/>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Location</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="location">
                </div>
                <div class="col-md-2"></div>
            </div>


            <div class="row" style="padding: 10px">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label >Introduction</label>
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" name="introduction" rows="3"></textarea>
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
                <div class="col-md-offset-6">
                    <!-- <button type="submit" class="btn btn-primary edit_btn_group" name="upload" >Submit</button> -->
                    <input type="submit" class="btn btn-primary edit_btn_group" name="upload" value="Submit">
                    <a href="classManage.php" class="btn btn-primary">Cancel</a>
                </div>

            </div>

        </form>

    </div>

</div>

</body>
</html>

<?php
include('config_wyj.php');

try{
    $con = $pdo;
    //$con = new PDO($db_host.";".$db_name, $db_user, $db_pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
}
catch(PDOException $e)
{
    echo "error:".$e->getMessage();
}

if(isset($_POST['upload']))

{

    // sanitize the input data
    $className = filter_input(INPUT_POST, 'className', FILTER_SANITIZE_STRING);
    $capacity = filter_input(INPUT_POST, 'capacity', FILTER_SANITIZE_STRING);
    $unitPrice = filter_input(INPUT_POST, 'unitPrice', FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
    $introduction = filter_input(INPUT_POST, 'introduction', FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];


    if($className ==null|| $capacity==null || $unitPrice==null || $location==null
        || $introduction==null || $image==null){
        echo "<script> alert(\"Please fill in all the blanks!\"); </script>";
    }

    else {


        $folder = "images/";

       // $image = $_FILES['image']['name'];

        $path = $folder . $image;

        $target_file = $folder . basename($_FILES["image"]["name"]);


        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


        $allowed = array('jpeg', 'png', 'jpg');

        $filename = $_FILES['image']['name'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);


        if (!in_array($ext, $allowed)) {

            echo "Sorry, only JPG, JPEG, PNG  files are allowed.";

        } else {

            move_uploaded_file($_FILES['image'] ['tmp_name'], $path);



            $sth=$con->prepare("insert into Training (id,className,capacity,price,location,introduction,classImage)
values (null,'$className','$capacity','$unitPrice','$location','$introduction','$image') ");

            $sth->execute();

            echo "<script> alert(\"update sucessfully!\"); </script>";
            //header("Location:facilityManage.php");
            echo "<script> location.href=\"classManage.php\";</script>";


        }
    }

}

?>



