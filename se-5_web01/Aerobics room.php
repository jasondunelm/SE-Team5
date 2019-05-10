<!DOCTYPE html>
<?php
include "PDO.php";
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

    <link rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
        <div id="content">
            <h1>Aerobics room</h1>
            <img src="images/yoga.jpg" style="height: 45vw; width:60vw; ">
            <button type="button" class="btn btn-primary btn-lg">BOOKING</button>
            <?php
            $sql="SELECT * FROM Fcility WHERE Name='Aerobics room'";
            // 名字可能会变



            $statement = $pdo->query($sql);
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo "Capacity: ".$rows['Capacity']."<br>".
                "Address: ".$rows['Address']."<br>".
                "UnitPrice: ".$rows['UnitPrice']."<br>".
                "Contact: ".$rows['Contact']."<br>".
                "Telephone: ".$rows['Telephone']."<br>".
                "Email: ".$rows['Email']."<br>";
            ?>


            `ID` int(11) DEFAULT NULL,
            `Name` varchar(50) DEFAULT NULL,
            `Capacity` int(11) DEFAULT NULL,
            `UnitPrice` int(11) DEFAULT NULL,
            `Address` varchar(255) DEFAULT NULL,
            `Contact` varchar(255) DEFAULT NULL,
            `Telephone` int(11) DEFAULT NULL,
            `Email` varchar(50) DEFAULT NULL,
        </div>



<div class="clearfix"></div>



</body>
</html>

