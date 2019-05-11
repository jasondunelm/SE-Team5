<?php
session_start();
include('functions_WebFront.php');
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">DUS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="events.php">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.teamdurham.com/queenscampus/">Queen's Campus</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Facilities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="facility.php ?id='fitness'">Fitness Suite</a>
                    <a class="dropdown-item" href="#">Sports Hall</a>
                    <a class="dropdown-item" href="#">Artificial Pitches</a>
                    <a class="dropdown-item" href="#">Rowing Tank</a>
                    <a class="dropdown-item" href="#">Ergo Gallery</a>
                    <a class="dropdown-item" href="#">Outdoor Facilities</a>
                    <a class="dropdown-item" href="#">Maiden Castle Physiotherapy</a>
                    <a class="dropdown-item" href="#">Aerobics Room</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
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











