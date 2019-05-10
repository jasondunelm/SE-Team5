<!DOCTYPE html>
<?php
include "PDO.php";
session_start();
$facilityName=$_GET ['facilityName'];

$sql="SELECT * FROM Facility WHERE facilityName='$facilityName'";
$statement = $pdo->query($sql);
$rows = $statement->fetch(PDO::FETCH_ASSOC);
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
<body>

<!-- the navigation bar of homepage -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
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
                <form action="facility.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="facilityName">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </form>
        <button type="button" class="btn btn-secondary">Login</button>

    </div>
</nav>

<div id="content" style="margin-left: 10%; margin-right: 10%; WORD-BREAK: break-all; WORD-WRAP: break-word">
            <center><h1><?php echo $facilityName?></h1></center><br>
            <div class="row">
                <div class="col-md-5">
                    <img src="src/<?php echo $rows['facilityPic'] ?>" style="width:100%; height:auto;"><br><br>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5" >
                    <div class="panel panel-default" style="background-color:gray">
                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Introduction:
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['facilityIntro']?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Capacity
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['capacity'] ?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Address:
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['address']?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    UnitPrice
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['unitPrice']?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Telephone:
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['telephone']?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Email:
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['email'] ?>
                            </div>
                        </div>

                        <div class="panel panel-default" style="background-color:white">
                            <div class="panel-heading" style="background-color:ghostwhite">
                                <h3 class="panel-title">
                                    Contact:
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $rows['contact'] ?>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg">BOOKING</button>
                </div>
            </div>

        </div>


<div class="clearfix"></div>
<div class="book_hg">
    <button type="button" class="btn btn-primary btn-lg">Book online now</button>
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

