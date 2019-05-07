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
    <meta name="author" content="Yujie Wen">
    <meta name="description" content="A online application software for DUS">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

<!-- the navigation bar of homepage -->
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
                <a class="nav-link" href="#">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.teamdurham.com/queenscampus/">Queen's Campus</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Facilities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Fitness Suite</a>
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
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </div>
        </form>
        <button type="button" class="btn btn-secondary">Login</button>

    </div>
</nav>


<div class="container">
    <h3>Collapsible Navbar</h3>
    <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
    <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div>



<div class="logo">
    <div class="logo_container">
        <h2 class="logo_text">Join us today</h2>
        <button type="button" class="btn btn-secondary">Sign Up</button>
    </div>
</div>

<div>
    <h2>HightLights</h2>
    <div class="responsive">
        <div class="gallery">
            <a target="_blank" href="#">
                <img src="src/tennis.jpg" alt="Cinque Terre" width="300" height="200">
            </a>
        </div>
    </div>


    <div class="responsive">
        <div class="gallery">
            <a target="_blank" href="img_forest.jpg">
                <img src="src/yoga.jpg" alt="Forest" width="300" height="200">
            </a>
        </div>
    </div>

    <div class="responsive">
        <div class="gallery">
            <a target="_blank" href="img_lights.jpg">
                <img src="src/tennis.jpg" alt="Northern Lights" width="300" height="200">
            </a>
        </div>
    </div>

    <div class="responsive">
        <div class="gallery">
            <a target="_blank" href="img_mountains.jpg">
                <img src="src/yoga.jpg" alt="Mountains" width="300" height="200">
            </a>
        </div>
    </div>
</div>

<div class="clearfix"></div>



</body>
</html>

