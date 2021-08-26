<?php
ob_start();
session_destroy();
unset($_SESSION['adminName']);
unset($_SESSION['userid']);
unset($_SESSION['userrole']);
unset($_SESSION['username']);
unset($_SESSION['email']);
session_unset();
session_destroy();
header('Location: login.php');
ob_end_flush();
?>