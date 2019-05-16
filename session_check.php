<?php
error_reporting(E_ALL^E_NOTICE);
if($_GET['action'] == "logout"){
    unset($_SESSION['role']);
    session_destroy();
}

$role = $_SESSION['role'];

if($role!=null && $role!='admin'){
    ?>
    <script type="text/javascript">
        document.getElementById('logout').style.display = 'block';
        document.getElementById('account_update').style.display = 'block';
        document.getElementById('login').style.display = 'none';
        document.getElementById('register').style.display = 'none';

    </script>
    <?php
}

if($role=='admin'){
    ?>
    <script type="text/javascript">
        document.getElementById('divId').style.display = 'block';
        document.getElementById('logout').style.display = 'block';
        document.getElementById('account_update').style.display = 'block';
        document.getElementById('login').style.display = 'none';
        document.getElementById('register').style.display = 'none';
    </script>
    <?php
}
?>
