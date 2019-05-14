<?php

if($_GET['action'] == "logout"){
    unset($_SESSION['role']);
    session_destroy();
    //echo '<script>url="index_admin.php";window.location.href=url;</script>';
}

$role = $_SESSION['role'];

if($role== null){
    ?>
    <script type="text/javascript">
        document.getElementById('divId').style.display = 'none';
        document.getElementById('logout').style.display = 'none';
        document.getElementById('account_update').style.display = 'none';
    </script>
    <?php
}
else if($role!='admin'){
    ?>
    <script type="text/javascript">
        document.getElementById('divId').style.display = 'none';
        document.getElementById('login').style.display = 'none';
        document.getElementById('register').style.display = 'none';
    </script>
    <?php
}else{
    ?>
    <script type="text/javascript">
        document.getElementById('login').style.display = 'none';
        document.getElementById('register').style.display = 'none';
    </script>
    <?php
}
?>
