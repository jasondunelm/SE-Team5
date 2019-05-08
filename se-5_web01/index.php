<!DOCTYPE html>
<?php

session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Homepage</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="SE-5">
    <meta name="description" content="A online application software for DUS">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<<<<<<< HEAD
    <!-- <link rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
=======

>>>>>>> 5e005c41999233fff5ad4f68684d41e5b5a51488

</head>
<body>

<?php
include('header.php');
?>


<div class="container">
    <div id="myCarousel" class="carousel slide" style="background-color:purple">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <center><a href="#"><img style="width:60vw; height:45vw;" src="src/tennis.jpg" alt="First slide"></a></center>
                <div class="carousel-caption">tennis</div>
            </div>
            <div class="carousel-item">
                <center><a href="#"><img  style="width:60vw; height:45vw;" src="src/Athletics%20track.jpg" alt="Second slide"></a></center>
                <div class="carousel-caption">Athletics track</div>
            </div>
            <div class="carousel-item">
                <center><a href="#"><img  style="width:60vw; height:45vw;" src="src/yoga.jpg" alt="Third slide"></a></center>
                <div class="carousel-caption">Aerobics room</div>
            </div>
            <div class="carousel-item">
                <center><a href="#"><img  style="width:60vw; height:45vw;" src="src/Squash%20courts.jpg" alt="Third slide"></a></center>
                <div class="carousel-caption">Squash courts</div>
            </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

</div>



<div class="logo">
    <div class="logo_container">
        <h2 class="logo_text">Join us today</h2>
        <button type="button" class="btn btn-primary">Sign Up</button>
    </div>
</div>

<div class="clearfix"></div>


<div class="pic_group">
    <div class="facilities">
        <h2>Facilities</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="test.php" class="pic_link">
                    <img src="src/yoga.jpg" alt="..." class="img-thumbnail">
                    <h3>Fitness Suite</h3>
                </a>
            </div>
            <div class="col-md-3">
                <a href="test.php" class="pic_link">
                    <img src="src/yoga.jpg" alt="..." class="img-thumbnail">
                    <h3>Sports Hall</h3>
                </a>
            </div>
            <div class="col-md-3">
                <a href="test.php" class="pic_link">
                    <img src="src/yoga.jpg" alt="..." class="img-thumbnail">
                    <h3>Artificial Pitches</h3>
                </a>
            </div>
            <div class="col-md-3">
                <a href="test.php" class="pic_link">
                    <img src="src/yoga.jpg" alt="..." class="img-thumbnail">
                    <h3>Rowing Tank</h3>
                </a>
            </div>

            <div class="col-md-3">
                <a href="test.php" class="pic_link">
                    <img src="src/yoga.jpg" alt="..." class="img-thumbnail">
                    <h3>Ergo Gallery</h3>
                </a>
            </div>
            <div class="col-md-3">
                <a href="test.php" class="pic_link">
                    <img src="src/yoga.jpg" alt="..." class="img-thumbnail">
                    <h3>Outdoor Facilities</h3>
                </a>
            </div>
            <div class="col-md-3">
                <a href="test.php" class="pic_link">
                    <img src="src/yoga.jpg" alt="..." class="img-thumbnail">
                    <h3>Physiotherapy</h3>
                </a>
            </div>
            <div class="col-md-3">
                <a href="test.php" class="pic_link">
                    <img src="src/yoga.jpg" alt="..." class="img-thumbnail">
                    <h3>Aerobics Room</h3>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="book_hg">
    <button type="button" class="btn btn-primary btn-lg">Booking now</button>
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

<?php
include('footer.php');
?>

</body>
</html>

