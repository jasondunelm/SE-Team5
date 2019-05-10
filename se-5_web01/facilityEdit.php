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
$name = $_GET['id'];
if($name !="new"){
    $pdo = new PDO($db_host.";".$db_name, $db_user, $db_pass);

    $sql="select * from Facility where facilityName= '" . $name. "';";
    $statement = $pdo->query($sql);
    $table_pre= $statement->fetchAll(PDO::FETCH_NUM);

}

?>

<h2>Edit facility information here:</h2>

<form class="facility_infor_edit" method="POST" action='facilityManage.php' enctype="multipart/form-data" >
    <div class="form-group">
        <label >Facility name</label>
        <input type="text" class="form-control" name="facilityName" placeholder="<?php echo $table_pre[0][1]; ?>">
    </div>
    <div class="form-group">
        <label >Capacity</label>
        <input type="text" class="form-control" name="capacity" placeholder="<?php echo $table_pre[0][2]; ?>" >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Unit price</label>
        <input type="text" class="form-control" name="unitPrice"" placeholder="<?php echo $table_pre[0][3]; ?>" >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Address</label>
        <input type="text" class="form-control" name="address" placeholder="<?php echo $table_pre[0][4]; ?>">
    </div>

<div class="form-group">
    <label for="exampleInputPassword1">Contact</label>
    <input type="text" class="form-control" name="contact" placeholder="<?php echo $table_pre[0][5]; ?>">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Telephone</label>
    <input type="text" class="form-control" name="telephone" placeholder="<?php echo $table_pre[0][6]; ?>">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="email" placeholder="<?php echo $table_pre[0][7]; ?>">
</div>

    <div class="form-group">
        <label for="exampleInputPassword1">Introduction</label>
        <textarea class="form-control" name="introduction" rows="3" placeholder="<?php echo $table_pre[0][8]; ?>"></textarea>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Picture</label>
        <input type="file" name="image" />
    </div>

    <button type="submit" class="btn btn-primary" name="upload" >Submit</button>
    <input type="button" class="btn btn-primary" name="upload" value="Submit"></input>
</form>
<div>
    <img src="<?php echo $table_pre[0][9]; ?>" alt="..." class="img-thumbnail">

    <!-- <input id="myFile" type="file" name="myFile" multiple class="file-loading"> -->


</div>

<?php


try{
    $con = new PDO($db_host.";".$db_name, $db_user, $db_pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
}
catch(PDOException $e)
{
    echo "error:".$e->getMessage();
}

// check the all the inputs!!!
// when add a new facility, check all the inputs.!!!




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

    $folder ="upload/";

    $image = $_FILES['image']['name'];

    $path = $folder . $image ;

    $target_file=$folder.basename($_FILES["image"]["name"]);


    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


    $allowed=array('jpeg','png' ,'jpg');

    $filename=$_FILES['image']['name'];

    $ext=pathinfo($filename, PATHINFO_EXTENSION);


    if(!in_array($ext,$allowed) )

{

    echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

}

else{

    move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);

    //$sth=$con->prepare("insert into pic(id,name,image)values(null,'',:image) ");
    //$sth=$con->prepare("insert into Facility(id,facilityName,capacity,unitPrice,address,contact,telephone,email,facilityIntro,facilityPic) values (null,'','','','','','$telephone','$email','$facilityIntro','$image') ");
    $sth=$con->prepare("insert into Facility(id,facilityName,capacity,unitPrice,address,contact,telephone,email,facilityIntro,facilityPic) values (null,'$facilityName','$capacity','$unitPrice','$address','$contact','$telephone','$email','$facilityIntro','$image') ");

    $sth->execute();

}

}

?>



<?php
include('footer.php');
?>
</body>
</html>

