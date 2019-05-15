<?php
session_start();
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
    <title>Homepage</title>

    <?php include('meta_data.php'); ?>
    <script>
        function userCheck(obj){
            var id = obj.value;

            if(id!=""){
                location.href="fullcalendar2/book_index.php";
            }else
                location.href="login.php";
        }
    </script>


</head>
<body>

<!-- carousel part -->
<div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="w-100" src="images/bg_1.png">
            <div class="carousel-caption text-success d-none d-sm-block">
<!--                <h1>Join us today</h1>-->
                <p class="text-light">
                    <a href="register.php" class="btn btn-primary btn-lg carousel_btn">Sign up today!</a>
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="w-100" src="images/bg_2.png">
            <div class="carousel-caption text-success d-none d-sm-block">
<!--                <h1>Have a try</h1>-->
                <p class="text-light">
                    <!-- <a href="fullcalendar2/book_index.php" class="btn btn-primary btn-lg carousel_btn">Book online</a> -->
                    <button class="btn btn-primary btn-lg carousel_btn" value="<?php echo $_SESSION['role']; ?>" onclick="userCheck(this)">Book sports facility</button>
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="w-100" src="images/bg_3.png">
            <div class="carousel-caption text-success d-none d-sm-block">
<!--                <h1>Access information, opening times</h1>-->
                <p class="text-light">
                    <a href="cater.php" class="btn btn-primary btn-lg carousel_btn">Find more info</a>
                </p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<div class="clearfix"></div>



<div class="pic_group">
    <div class="facilities">
        <h2>Facilities</h2>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="facility.php?facilityName=Fitness Suite" class="pic_link">
                    <img src="images/fitnessSuite01.jpg" alt="..." class="img-thumbnail">
                    <h5>Fitness Suite</h5>
                </a>
            </div>
            <div class="col-md-3">
                <a href="sportsHall.php" class="pic_link">
                    <img src="images/Sports hall.jpg" alt="..." class="img-thumbnail">
                    <h5>Sports Hall</h5>
                </a>
            </div>
            <div class="col-md-3">
                <a href="facility.php?facilityName=Artificial Pitches" class="pic_link">
                    <img src="images/Artificial Pitches.jpg" alt="..." class="img-thumbnail">
                    <h5>Artificial Pitches</h5>
                </a>
            </div>
            <div class="col-md-3">
                <a href="facility.php?facilityName=Rowing Tank" class="pic_link">
                    <img src="images/rowingTank02.jpg" alt="..." class="img-thumbnail">
                    <h5>Rowing Tank</h5>
                </a>
            </div>

            <div class="col-md-3">
                <a href="facility.php?facilityName=Ergo Gallery" class="pic_link">
                    <img src="images/ergoGallery.jpg" alt="..." class="img-thumbnail">
                    <h5>Ergo Gallery</h5>
                </a>
            </div>
            <div class="col-md-3">
                <a href="outdoorFacilities.php" class="pic_link">
                    <img src="images/outdoor02.jpg" alt="..." class="img-thumbnail">
                    <h5>Outdoor Facilities</h5>
                </a>
            </div>
            <div class="col-md-3">
                <a href="facility.php?facilityName=Maiden Castle Physiotherapy" class="pic_link">
                    <img src="images/therapy.jpg" alt="..." class="img-thumbnail">
                    <h5>Maiden Castle Physiotherapy</h5>
                </a>
            </div>
            <div class="col-md-3">
                <a href="facility.php?facilityName=Aerobics Room" class="pic_link">
                    <img src="images/aerobic.jpg" alt="..." class="img-thumbnail">
                    <h5>Aerobics Room</h5>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="clearfix"></div>
<div class="book_hg">
    <button type="button" class="btn btn-primary btn-lg" value="<?php echo $_SESSION['role']; ?>"  onclick="userCheck(this)">Book online now</button>
</div>
<hr>

<div>
    <div class="facilities">
        <h2>Contact us</h2>
    </div>
    <div class="facilities">
        <p>For prices, bookings, membership enquiries or general enquiries, please contact us:<br />
            Tel: 0191 334 2178<br /><br />

        For multi-bookings or events please contact:<br />
        Tel: 0191 334 7216<br />
        Email: teamdurham.bookings@durham.ac.uk<br /><br />
        Durham University Sport<br />
        The Graham Sports Centre,<br />
        Durham University<br />
        Stockton Road<br />
            DH1 3SE<br /><br /></p>

        <h3>Parking</h3>
        <p>Parking is available onsite at the main car park.</p>
    </div>

</div>
</body>
</html>

