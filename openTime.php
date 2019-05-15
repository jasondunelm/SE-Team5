<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Open Time</title>

    <?php
    include('meta_data.php');
    ?>

</head>
<body>

<?php
include('header.php');
include('session_check.php');
?>


<div class="facilities">
    <h2>Opening Times</h2>

    <h4>Normal open times</h4>
    <p>
        Monday to Friday – 7.00 am – 10.00 pm<br /><br />

        Saturday & Sunday – 9.00 am – 6.00 pm<br /><br />

        Please note that last entry to the fitness suite is 9.15 pm during the week and 5.15 pm on a week-end.

    </p>
   <h4>Bank holidays</h4>
    <p>
        For bank holiday opening hours please contact reception on 0191 334 2178.
    </p>
</div>





<?php
include('session_check.php');
include('footer.php');
?>
</body>
</html>

