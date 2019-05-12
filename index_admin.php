<?php
session_start();
?>
<!DOCTYPE html>
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


    <!-- <link rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>

<!-- the navigation bar of homepage -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="images/small_logo.png">&nbsp;&nbsp;
    <a class="navbar-brand" href="https://www.teamdurham.com">DUS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index_admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="events.php">Events</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Facilities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="facility.php?facilityName=Fitness Suite">Fitness Suite</a>
                    <a class="dropdown-item" href="sportsHall.php">Sports Hall</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Artificial Pitches">Artificial Pitches</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Rowing Tank">Rowing Tank</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Ergo Gallery">Ergo Gallery</a>
                    <a class="dropdown-item" href="outdoorFacilities.php">Outdoor Facilities</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Maiden Castle Physiotherapy">Maiden Castle Physiotherapy</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Aerobics Room">Aerobics Room</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://www.teamdurham.com/queenscampus/">Queen's campus</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Other Information
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="openTime.php">Open time</a>
                    <a class="dropdown-item" href="cater.php">Catering</a>
                    <a class="dropdown-item" href="https://www.accessable.co.uk">Access Information</a>

                </div>
            </li>

            <li class="nav-item dropdown" id="divId">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Management
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="facilityManage.php">Facility Mgt.</a>
                    <a class="dropdown-item" href="cater.php">User Mgt.</a>
                    <a class="dropdown-item" href="https://www.accessable.co.uk">Booking Mgt.</a>

                </div>
            </li>


        </ul>
        <form class="form-inline my-2 my-lg-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <!--  class="btn btn-outline-success my-2 my-sm-0" -->
            </div>
        </form>

        <ul class="navbar-nav mr-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Accounts
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" id="login" href="login.php">Login</a>
                    <a class="dropdown-item" id="register" href="register.php">Sign up</a>
                    <a class="dropdown-item" id="logout" href="index_admin.php?action=logout">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

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
                <h1>Join us today</h1>
                <p class="text-light">
                    <a href="register.php" class="btn btn-primary btn-lg">Sign up</a>
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="w-100" src="images/bg_2.png">
            <div class="carousel-caption text-success d-none d-sm-block">
                <h1>Have a try</h1>
                <p class="text-light">
                    <!--   ---------------------------------   ---------- change here to book page -->
                    <a href="register.php" class="btn btn-primary btn-lg">Book online</a>
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="w-100" src="images/bg_3.png">
            <div class="carousel-caption text-success d-none d-sm-block">
                <h1>Maiden Castle</h1>
                <p class="text-light">Access information, opening times
                    <a href="openTime.php" class="btn btn-primary btn-lg">Find more</a>
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
    <!-- change here to book page -->
    <!-- -------------------------------------------------- ----->
    <a href="register.php" class="btn btn-primary btn-lg">Book online now</a>
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
include('session_check.php');
include('footer.php');
?>


</body>
</html>

