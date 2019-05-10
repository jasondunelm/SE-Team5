<!DOCTYPE html>
<?php

session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cater</title>

    <?php
    include('meta_data.php');
    ?>

</head>
<body>

<?php
include('header.php');
?>


<div class="facilities">
    <h2>Catering</h2>
    <p>
        Maiden Castle Café serves a delicious range of hot dishes, including a chef's theatre station with internationally inspired dishes. Freshly made baguettes, salads and paninis are also available.
    </p>

    <h4>Opening Times</h4>
    <div class="container">
        <div class="row">
            <div class="col col-6 col_cater_time">

                <p>
                <br /><br />

                08:00am to 20:30 - Monday & Tuesday<br />

                08:00am to 21:00 - Wednesday<br />

                08:00am to 20:30 - Thursday<br />

                08.00am to 18:00 - Friday<br />

                08.30am to 18:00 - Saturday<br />

                08.30am to 15:00 - Sunday
                </p>
            </div>
            <div class="col col-6">
                <img class="img-thumbnail"
                     src="src/cater.jpg"
                     alt="catering picture of Maiden castle ">
            </div>
        </div>
    </div>
    <h4>Location</h4>
    <p>Maiden Castle Café is located within the Graham Sports Centre, Stockton Road, Durham and on the <a href="https://www.dur.ac.uk/map/">University</a> map.</p>

</div>





<?php
include('footer.php');
?>
</body>
</html>

