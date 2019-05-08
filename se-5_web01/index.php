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

<?php
include('header.php');
?>


<div class="container">
    <h3>Collapsible Navbar</h3>
    <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
    <p>Only when the button is clicked, the navigation bar will be displayed.</p>
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

