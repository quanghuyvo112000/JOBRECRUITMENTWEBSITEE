<?php 

    include_once('../sql/dhb.php');

    session_start();
    session_unset();
    session_destroy();

    header('location: ../app/dangnhap.php');

?>