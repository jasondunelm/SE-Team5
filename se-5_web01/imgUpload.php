<?php
include("functions_WebFront.php");
// add new facility into the database
if ($_POST['submit'] == "Add New Facility") {

    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

    if (!addslashes($_POST['add_new_facilityID'])) {
        $error .= "<br />Please enter a new facility ID.";
    }

    if (!addslashes($_POST['add_new_facility_name'])) {
        $error .= "<br />Please enter a new facility name.";
    }

    if (!addslashes($_POST['add_new_maxNum_of_player'])) {
        $error .= "<br />Please enter the maximum number of players for this facility.";
    }

    if (!addslashes($_POST['add_new_unit_price'])) {
        $error .= "<br />Please enter the unit price for this facility.";
    }

    if (!addslashes($_POST['add_new_facility_address'])) {
        $error .= "<br />Please enter address of this facility.";
    }

    if (!addslashes($_POST['add_new_facility_contactPerson'])) {
        $error .= "<br />Please enter a contact person of this facility.";
    }

    if (!addslashes($_POST['add_new_facility_tel'])) {
        $error .= "<br />Please enter a telephone number of this facility.";
    }

    if (!addslashes($_POST['add_new_facility_email'])) {
        $error .= "<br />Please enter an email address of this facility.";
    }

    if (!addslashes($_POST['add_new_facility_introduction'])) {
        $error .= "<br />Please add some information of this facility.";
    }

    if(!$image) {
        $error .= "<br />Please choose a facility cover image.";
    }

}
if ($error) {
    $error = "There were error(s) in your add new facility details:" . $error;
} else {

    $query = "SELECT * FROM Facility WHERE id='" . mysqli_real_escape_string($link, $_POST['add_new_facilityID']) . "'";

    $result = mysqli_query($link, $query);

    $results = mysqli_num_rows($result);

    if ($results) {
        $error = "That facility ID is already registered, please choose another one.";
    } else {

        $query = "INSERT INTO Facility (id, facilityName, capacity, unitPrice, address, contact, telephone, email, facilityIntro, facilityPic) 
VALUES('" . mysqli_real_escape_string($link, $_POST['add_new_facilityID']) . "','" . mysqli_real_escape_string($link, $_POST['add_new_facility_name']) . "','" . mysqli_real_escape_string($link, $_POST['add_new_maxNum_of_player']) . "','" . mysqli_real_escape_string($link, $_POST['add_new_unit_price']) . "','" . mysqli_real_escape_string($link, $_POST['add_new_facility_address']) . "','" . mysqli_real_escape_string($link, $_POST['add_new_facility_contactPerson']) . "','" . mysqli_real_escape_string($link, $_POST['add_new_facility_tel']) . "','" . mysqli_real_escape_string($link, $_POST['add_new_facility_email']) . "','" . mysqli_real_escape_string($link, $_POST['add_new_facility_introduction']) . "','$image')";

        $data = mysqli_query($link, $query);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $message = "Facility info updated successfully! <a href=''>Check updated list here</a>";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">

            <img src="images/logo.png"><br><br>

            <?php displayError(); ?>

            <h2 class="font-weight-bold">Update facility</h2>

            <form method="post" class="mx-auto" enctype="multipart/form-data">

                <table class="table-sm table-dark">

                    <tr>
                        <td>Facility ID</td>
                        <td><input type="text" class="form-control text-center" name="add_new_facilityID" value="<?php echo addslashes($_POST['add_new_facilityID']); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Facility Name</td>
                        <td><input type="text" class="form-control text-center" name="add_new_facility_name" value="<?php echo addslashes($_POST['add_new_facility_name']); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Capacity</td>
                        <td><input type="text" class="form-control text-center" name="add_new_maxNum_of_player" value="<?php echo addslashes($_POST['add_new_maxNum_of_player']); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Unit Price</td>
                        <td><input type="text" class="form-control text-center" name="add_new_unit_price" value="<?php echo addslashes($_POST['add_new_unit_price']); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" class="form-control text-center" name="add_new_facility_address" value="<?php echo addslashes($_POST['add_new_facility_address']); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td><input type="text" class="form-control text-center" name="add_new_facility_contactPerson" value="<?php echo addslashes($_POST['add_new_facility_contactPerson']); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Telephone</td>
                        <td><input type="text" class="form-control text-center" name="add_new_facility_tel" value="<?php echo addslashes($_POST['add_new_facility_tel']); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" class="form-control text-center" name="add_new_facility_email" value="<?php echo addslashes($_POST['add_new_facility_email']); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Facility Introduction</td>
                        <td><textarea type="text" class="form-control text-left" cols="70" rows="10" name="add_new_facility_introduction"><?php echo addslashes($_POST['add_new_facility_introduction']); ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Picture</td>
                        <td><input type="file" name="image">
                    </tr>
                </table>
                <input class="btn btn-primary my-2 my-sm-0\" type="submit" name="submit" value="Add New Facility"/>
                <input class="btn btn-primary my-2 my-sm-0\ ml-5" type="submit" name="cancelFacilityEdit" value="Cancel"/>
            </form>

        </div>
    </div>
</div>
</body>
</html>