<?php
//session_start();
//include('functions_WebFront.php');
error_reporting(E_ALL^E_NOTICE);
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
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <img src="images/small_logo.png">&nbsp;&nbsp;
    <a class="navbar-brand" href="https://www.teamdurham.com">DUS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon bg-transparent"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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


        </ul>
        <form class="form-inline my-2 my-lg-0" action="search_result.php" method="post">
            <div class="btn-group" role="group" aria-label="Basic example">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="facilityName">
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
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="register.php">Sign up</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="footer">

    <nav class="navbar navbar-expand-sm bg-light" id="footer">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="https://www.dur.ac.uk/contactform2/?pageid=59579">Comments & Questions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.dur.ac.uk/about/terms/">Disclaimer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.dur.ac.uk/about/trading_name/">Trading Name</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.dur.ac.uk/about/cookies/">Cookies usage policy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.dur.ac.uk/ig/dp/privacy/">Privacy Notices</a>
            </li>
        </ul>
    </nav>
</div>
</body>

</html>











